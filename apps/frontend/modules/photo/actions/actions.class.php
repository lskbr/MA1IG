<?php

/**
 * photo actions.
 *
 * @package    grainedevie
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->photos = Doctrine_Core::getTable('Photo')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->photo);
  }

}
