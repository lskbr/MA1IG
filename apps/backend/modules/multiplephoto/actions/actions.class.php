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
    $this->logMessage('BEFORE SAVE');
     $this->form->bind($request->getParameter('multiplephoto'), $request->getFiles('multiplephoto'));
     //if($this->form->isValid()){                
        $photo = new Photo();
        $files = $request->getFiles('multiplephoto');
        $data = $request->getParameter('multiplephoto');
        $this->logMessage("DATA DUMP: ".my_dump($data));
        $this->logMessage("REQUEST DUMP: ".my_dump($request));
        foreach($files as $x => $y)
           { $this->logMessage('NILOX: '.$x.'->'.$y);
              foreach($y as $a => $b)
                 $this->logMessage('  NILOX: '.$a.'->'.$b);
            }       
        $this->logMessage("DATA DUMP2: ".my_dump($files));                    
        $this->logMessage('NILOZ:'.$files['uploadedfile']['tmp_name'],'info');        
        
        $photo->setTitle($data['title']);
        $photo->setGaleryId($data['galery_id']);
        $photo->setDescription($data['description']);

        $new_name = sha1($files['uploadedfile']['tmp_name'].$files['uploadedfile']['name'].$files['uploadedfile']['size']);
        $original_name_parts = pathinfo($files['uploadedfile']['name']);
        $orignal_extension = $original_name_parts['extension'];
        $new_name .= ".".$orignal_extension;
        $this->logMessage('NILO:'.$new_name);
        move_uploaded_file($files['uploadedfile']['tmp_name'], Photo::$PHOTODIR.$new_name);
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
