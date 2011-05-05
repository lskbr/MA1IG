<?php

/**
 * subscription actions.
 *
 * @package    grainedevie
 * @subpackage subscription
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subscriptionActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
  }
  public function executeDelete(sfWebRequest $request)
  {
    $s = $this->getRoute()->getObject();
    $s->delete();
    $this->redirect('homepage');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SubscriberForm();
    $this->form->setDefault('hash', md5(uniqid()));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SubscriberForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $subscriber = $form->save();

      $this->redirect('subscription/success');
    }
  }
}
