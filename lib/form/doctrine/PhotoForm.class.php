<?php

/**
 * Photo form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at']);
    $this->embedI18n(array('fr', 'en', 'pt', 'nl'));

  	//$this->widgetSchema['title'] = new sfWidgetFormInputText();
  	$this->widgetSchema['url'] = new sfWidgetFormInputFileEditable(array(
        'label' => "Photo",
        'file_src'  => '/uploads/photo/'.$this->getObject()->getUrl(),
        'is_image'  => true,
        'with_delete' => true,
        'edit_mode' => true,
        'delete_label' => 'Supprimer le fichier photo actuellement présent sur le site'
      ), array('class' => 'photo'));
    //$this->widgetSchema['upload'] = new sfWidgetFormInputSWFUpload(array(
    //'swfupload_upload_url' => $_SERVER['REQUEST_URI'].'/multiple'
    //));
  	//$this->widgetSchema['description'] = new sfWidgetFormTextArea();
  	$this->widgetSchema['publication_start'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
  	$this->widgetSchema['publication_end'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
	  $this->validatorSchema['url'] = new sfValidatorFile(array(
		  'required' => false,
		  'path' => sfConfig::get('sf_upload_dir').'/photo',
		  'mime_types' => 'web_images',
	));
	  //$this->validatorSchema['upload'] = new sfValidatorFile();
	
	//$this->validatorSchema['title'] = new sfValidatorString(array('required' => true));
	//$this->validatorSchema['description'] = new sfValidatorString(array('required' => false));
  }
}
