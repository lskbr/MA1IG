<?php

/**
 * multiplephoto actions.
 *
 * @package    grainedevie
 * @subpackage multiplephoto
 * @author     Nilo Menezes
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
    $this->logMessage('TEST','info');
    if($request->isMethod('put'))
    {          
     $this->form->bind($request->getParameter('multiplephoto'), $request->getFiles('multiplephoto'));
     //if($this->form->isValid()){
        
        $photo = new Photo();
        $file = $this->form->getValue('upload');
        //$this->logMessage('NILO:'.implode($request),'info');
        $files = $request->getFiles('multiplephoto');
        foreach($files as $x => $y)
           { $this->logMessage('NILOX: '.$x.'->'.$y);
              foreach($y as $a => $b)
                 $this->logMessage('  NILOX: '.$a.'->'.$b);
            }
                           
        $this->logMessage('NILOZ:'.$files['upload']['tmp_name'],'info');
        $photo->setTitle($request->getParameter('multiplephoto[title]'));
        //$photo->setTitle($this->form->getValue('upload'));
        $photo->setDescription($request->getParameter('multiplephoto[title]'));
        $new_name = sha1($files['upload']['tmp_name'].$files['upload']['name'].$files['upload']['size']);
        $this->logMessage('NILO:'.$new_name);
        move_uploaded_file($files['upload']['tmp_name'], sfConfig::get('sf_upload_dir').'/photo/'.$new_name);
        $photo->setUrl($new_name);
        $photo->save();      
        $this->setLayout(false);
        return sfView::NONE;
     //}else {
     //   $this->forward404();
     //}
    }
  }
}
