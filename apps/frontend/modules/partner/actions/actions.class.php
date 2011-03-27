<?php

/**
 * partner actions.
 *
 * @package    grainedevie
 * @subpackage partner
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class partnerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->partner = Doctrine_Core::getTable('partner')->createQuery('a')->innerJoin('a.Translation t')->where("t.lang=?", $this->getUser()->getCulture())->andWhere('t.is_visible=?', true)->execute();
  }
}
