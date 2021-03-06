<?php

/**
 * Newsletter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Newsletter extends BaseNewsletter
{
	protected $frontendRouting = null;
	public function frontendRouting()
    {
      if (!$this->frontendRouting)
      {
         $this->frontendRouting = new sfPatternRouting(new sfEventDispatcher());
         $config = new sfRoutingConfigHandler();
         $routes = $config->evaluate(array(sfConfig::get('sf_apps_dir').'/frontend/config/routing.yml'));
 
         $this->frontendRouting->setRoutes($routes);
      }
 
      return $this->frontendRouting;
    }

	public function save(Doctrine_Connection $conn = null)
	{
		$this->setSubscriberCount(Doctrine::getTable('Subscriber')->count());

		$subscribers=Doctrine::getTable('Subscriber')->findAll();
		sfApplicationConfiguration::getActive()->loadHelpers(array('Url', 'Tag'));
		foreach($subscribers as $s)
		{
		    $mail=sfContext::getInstance()->getMailer()->compose(
		      array(config::getInstance()->get('newsletter_mail') => 'Graine de vie'),
		      $s->getEmail(),
		      'Newsletter : '.$this->getNews()->getTitle(),''
		      
		    )->setBody($this->getNews()->getContent().'<br/><a href="'.$_SERVER['HTTP_HOST'].$this->frontendRouting()->generate('unsubscribe',$s,true).'">Me supprimer de cette liste de diffusion</a>', 'text/html');
		    sfContext::getInstance()->getMailer()->send($mail);
		}
		return parent::save($conn);
	}
}