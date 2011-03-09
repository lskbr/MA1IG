<?php

/**
 * configuration actions.
 *
 * @package    grainedevie
 * @subpackage configuration
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class configurationActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->configs=Doctrine_Query::create()->from('Configuration c')->orderBy('configuration_id')->execute();
  }
  public function executeUpdate(sfWebRequest $request)
  {
  	$this->configs=Doctrine_Query::create()->from('Configuration c')->orderBy('configuration_id')->execute();
  	foreach($this->configs as $config)
  	{
  		if($config->getType()==1)
  			$config->setIsActivated($config->getIsKernel() || isset($_POST['options'][$config->getId()]));
  		else
  			if(isset($_POST['options'][$config->getId()]))
  				$config->setValue($_POST['options'][$config->getId()]);
  		$config->save();
  	}
  	$this->getUser()->setFlash('notice','La configuration du site à été mise à jour.');
  	$this->redirect('configuration');
  }
}
