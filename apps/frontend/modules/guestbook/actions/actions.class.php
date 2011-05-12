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
  public function executeIndex(sfWebRequest $request)
  { 
    $this->guestbook = Doctrine_Core::getTable('guestbook')->createQuery('a')->innerJoin('a.Language l')->where("l.abbreviation=?", $this->getUser()->getCulture())->andWhere("a.is_validated=?",true)->execute();
    $this->form = new FrontendGuestbookForm();
  }

  public function executeShow(sfWebRequest $request)
  {
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FrontendGuestbookForm();

    $this->processForm($request, $this->form);

    $this->redirect('guestbook/show');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $guestbook = $form->save();
      $guestbook->setIsValidated(false);
      $lang=Doctrine::getTable('Language')->findOneByAbbreviation($this->getUser()->getCulture());
      $guestbook->setLanguageId($lang->getId());
      $guestbook->save();

      $this->redirect('guestbook/show');
    }
  }
}
