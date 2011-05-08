<?php

/**
 * google_analytics actions.
 *
 * @package    grainedevie
 * @subpackage google_analytics
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class google_analyticsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->google_analyticss = Doctrine_Core::getTable('GoogleAnalytics')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->google_analytics = Doctrine_Core::getTable('GoogleAnalytics')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->google_analytics);
  }

/*
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GoogleAnalyticsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GoogleAnalyticsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
*/
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($google_analytics = Doctrine_Core::getTable('GoogleAnalytics')->find(array($request->getParameter('id'))), sprintf('Object google_analytics does not exist (%s).', $request->getParameter('id')));
    $this->form = new GoogleAnalyticsForm($google_analytics);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($google_analytics = Doctrine_Core::getTable('GoogleAnalytics')->find(array($request->getParameter('id'))), sprintf('Object google_analytics does not exist (%s).', $request->getParameter('id')));
    $this->form = new GoogleAnalyticsForm($google_analytics);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
/*
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($google_analytics = Doctrine_Core::getTable('GoogleAnalytics')->find(array($request->getParameter('id'))), sprintf('Object google_analytics does not exist (%s).', $request->getParameter('id')));
    $google_analytics->delete();

    $this->redirect('google_analytics/index');
  }
*/
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $google_analytics = $form->save();

      $this->redirect('google_analytics/edit?id='.$google_analytics->getId());
    }
  }
}
