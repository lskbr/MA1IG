<?php

/**
 * galery actions.
 *
 * @package    grainedevie
 * @subpackage galery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galeryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->galerys = Doctrine_Core::getTable('Galery')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->galery = Doctrine_Core::getTable('Galery')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->galery);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GaleryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GaleryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($galery = Doctrine_Core::getTable('Galery')->find(array($request->getParameter('id'))), sprintf('Object galery does not exist (%s).', $request->getParameter('id')));
    $this->form = new GaleryForm($galery);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($galery = Doctrine_Core::getTable('Galery')->find(array($request->getParameter('id'))), sprintf('Object galery does not exist (%s).', $request->getParameter('id')));
    $this->form = new GaleryForm($galery);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($galery = Doctrine_Core::getTable('Galery')->find(array($request->getParameter('id'))), sprintf('Object galery does not exist (%s).', $request->getParameter('id')));
    $galery->delete();

    $this->redirect('galery/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $galery = $form->save();

      $this->redirect('galery/edit?id='.$galery->getId());
    }
  }
}
