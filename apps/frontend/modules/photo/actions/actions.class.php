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
      ->createQuery('a');
      //->execute();
    //$this->photo = $this->getRoute()->getObject();
    $this->pager = new sfDoctrinePager(
        'Photo', 10  //sfConfig::get('app_max_jobs_on_category')
    );
    //$this->pager->setQuery($this->photo->getPhotoPage());
    $this->pager->setQuery($this->photos);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->photo);    
  }

}
