<?php

/**
 * Photo form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MultiplePhotoForm extends sfForm
{
  public function configure()
  {    	
    $this->widgetSchema['title'] = new sfWidgetFormInputText();
    $this->widgetSchema['description'] = new sfWidgetFormInputText();
    $this->widgetSchema['galery_id'] = new sfWidgetFormDoctrineChoice(
	    array('model' => 'Galery', 'add_empty' => true));
    $this->widgetSchema['uploadedfile'] = new sfWidgetFormInputSWFUpload(array(
    ));
    $this->widgetSchema->setNameFormat('multiplephoto[%s]');
    $this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
	//$this->validatorSchema['upload'] = new sfValidatorFile();
  }
}
