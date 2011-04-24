<?php

/**
 * news actions.
 *
 * @package    grainedevie
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->news=Doctrine_Core::getTable('News')->createQuery('a')->where("a.publication_date < NOW()")->andWhere("a.is_activated=?",true)->orderBy('a.publication_date DESC')->execute();
  }
  public function executeShow(sfWebRequest $request)
  {
  	$this->news = $this->getRoute()->getObject();
  }
}
