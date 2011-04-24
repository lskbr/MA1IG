<?php

/**
 * counter actions.
 *
 * @package    grainedevie
 * @subpackage counter
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class counterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->counters = Doctrine_Core::getTable('Counter')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->counter = Doctrine_Core::getTable('Counter')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->counter);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CounterForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CounterForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($counter = Doctrine_Core::getTable('Counter')->find(array($request->getParameter('id'))), sprintf('Object counter does not exist (%s).', $request->getParameter('id')));
    $this->form = new CounterForm($counter);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($counter = Doctrine_Core::getTable('Counter')->find(array($request->getParameter('id'))), sprintf('Object counter does not exist (%s).', $request->getParameter('id')));
    $this->form = new CounterForm($counter);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($counter = Doctrine_Core::getTable('Counter')->find(array($request->getParameter('id'))), sprintf('Object counter does not exist (%s).', $request->getParameter('id')));
    $counter->delete();

    $this->redirect('counter/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $counter = $form->save();

      $this->redirect('counter/edit?id='.$counter->getId());
    }
  }
}
