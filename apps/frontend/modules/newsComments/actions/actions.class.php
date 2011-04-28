<?php

/**
 * newsComments actions.
 *
 * @package    grainedevie
 * @subpackage newsComments
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsCommentsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->news_commentss = Doctrine_Core::getTable('NewsComments')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->news_comments = Doctrine_Core::getTable('NewsComments')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->news_comments);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NewsCommentsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewsCommentsForm();

    $this->processForm($request, $this->form);

    $this->redirect('news');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($news_comments = Doctrine_Core::getTable('NewsComments')->find(array($request->getParameter('id'))), sprintf('Object news_comments does not exist (%s).', $request->getParameter('id')));
    $this->form = new NewsCommentsForm($news_comments);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($news_comments = Doctrine_Core::getTable('NewsComments')->find(array($request->getParameter('id'))), sprintf('Object news_comments does not exist (%s).', $request->getParameter('id')));
    $this->form = new NewsCommentsForm($news_comments);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($news_comments = Doctrine_Core::getTable('NewsComments')->find(array($request->getParameter('id'))), sprintf('Object news_comments does not exist (%s).', $request->getParameter('id')));
    $news_comments->delete();

    $this->redirect('newsComments/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $news_comments = $form->save();
      if($news_comments->getSfGuardUser()!=$this->getUser()->getGuardUser())
      {
        $news_comments->setSfGuardUser($this->getUser()->getGuardUser());
        $news_comments->save();
      }
      $this->redirect($this->generateUrl('news_show',$news_comments->getNews()).'#comment_form');
    }
  }
}