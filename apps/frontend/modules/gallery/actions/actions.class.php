<?php

/**
 * gallery actions.
 *
 * @package    grainedevie
 * @subpackage gallery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->galerys = Doctrine_Core::getTable('Galery')
      ->createQuery('g')
      ->where('g.is_activated = ?', 1)
      ->orderBy('g.position')
      ->execute();
  }
  public function executeShow(sfWebRequest $request)
  {
    $galery_id = $request->getParameter('id');
    $this->galery = Doctrine_Core::getTable('Galery')
      ->find($galery_id);
    $this->photos = Doctrine_Core::getTable('Photo')
    ->createQuery('p')
    ->where('p.galery_id = ?', $galery_id)
    ->execute();
    $this->forward404Unless($this->photos->count());
  }

}
