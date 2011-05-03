<?php

/**
 * multiplephoto actions.
 *
 * @package    grainedevie
 * @subpackage multiplephoto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class multiplephotoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new MultiplePhotoForm();
    //$this->logMessage('TEST','info');
    if($request->isMethod('put'))
    {          
     $this->form->bind($request->getParameter('multiplephoto'), $request->getFiles('multiplephoto'));
     $photo = new Photo();  
     //$photo->setTitle($request->getParameter('title'));
     
     $file = $this->form->getValue('upload');
     $photo->setTitle($this->form->getValues());
     $photo->setDescription($file);
     $photo->setUrl("265853a8e690b3bb8d72d9884cb4b145c4297032.jpg");
     $photo->save(); 
     $this->setLayout(false);
     return sfView::NONE;
    }
  }
}
