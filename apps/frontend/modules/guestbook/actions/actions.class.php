<?php

/**
 * guestbook actions.
 *
 * @package    grainedevie
 * @subpackage guestbook
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class guestbookActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  { 
    $this->guestbook = Doctrine_Core::getTable('guestbook')->createQuery('a')->innerJoin('a.Language l')->where("l.abbreviation=?", $this->getUser()->getCulture())->andWhere("a.is_validated=?",true)->execute();
  }
}
