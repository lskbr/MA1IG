<?php


function my_dump($var)
  {
    ob_start();
    var_dump($var);
    return ob_get_clean();
  }

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
  public function generateNewFileName($uploadedFile)
  {
        $new_name = sha1($uploadedFile['tmp_name'].
                         $uploadedFile['name'].
                         $uploadedFile['size']);

        $original_name_parts = pathinfo($uploadedFile['name']);
        $orignal_extension = $original_name_parts['extension'];
        $new_name .= ".".strtolower($orignal_extension);
        return $new_name;
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new MultiplePhotoForm();
    if($request->isMethod('put'))
    {          
     $this->form->bind($request->getParameter('multiplephoto'), 
                       $request->getFiles('multiplephoto'));
     //if($this->form->isValid()){                        
        $files = $request->getFiles('multiplephoto');
        $data = $request->getParameter('multiplephoto');                            
        $photo = new Photo();
        if(isset($data['title']))
          $photo->setTitle($data['title']);
        if(isset($data['galery_id']))
          $photo->setGaleryId($data['galery_id']);
        if(isset($data['description']))
          $photo->setDescription($data['description']);
        $new_name = $this->generateNewFileName($files['uploadedfile']);        
        move_uploaded_file($files['uploadedfile']['tmp_name'], $photo->getPhotoUploadFolder().$new_name);
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
