<?php

/**
 * faq actions.
 *
 * @package    grainedevie
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->faq = Doctrine_Core::getTable('faq')->createQuery('a')->innerJoin('a.Translation t')->where("t.lang=?", $this->getUser()->getCulture())->andWhere('t.is_activated=?', true)->orderBy('a.faq_category_id')->execute();
    $this->faq_category = Doctrine_Core::getTable('faqCategory')->createQuery('a')->innerJoin('a.Translation t')->where("t.lang=?", $this->getUser()->getCulture())->execute();
  }
  public function executeShow(sfWebRequest $request)
  {
  	$faq = $this->getRoute()->getObject();
  	$faq->save();
  	$this->redirect($faq->getSite());
  }
}
