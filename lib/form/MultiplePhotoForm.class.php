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
    $this->widgetSchema['upload'] = new sfWidgetFormInputSWFUpload(array(
    ));
    $this->widgetSchema->setNameFormat('multiplephoto[%s]');
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => false));
	//$this->validatorSchema['upload'] = new sfValidatorFile();
  }
}
