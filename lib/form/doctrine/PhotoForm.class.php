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
    $languages=Doctrine_Query::create()->from('Language l')->execute();
    $lang_abb=array();
    foreach($languages as $lang)
        $lang_abb[]=$lang->getAbbreviation();
    sfContext::getInstance()->getUser()->setculture('fr');
    $this->embedI18n($lang_abb);
    foreach($languages as $lang)
          $this->widgetSchema->setLabel($lang->getAbbreviation(),$lang->getName());

  	//$this->widgetSchema['title'] = new sfWidgetFormInputText();
    //$this->widgetSchema['description'] = new sfWidgetFormInputText();
  	$this->widgetSchema['url'] = new sfWidgetFormInputFileEditable(array(
        'label' => "Photo",
        'file_src'  => '/uploads/photo/'.$this->getObject()->getUrl(),
        'is_image'  => true,
        'with_delete' => true,
        'edit_mode' => true,
        'delete_label' => 'Supprimer le fichier photo actuellement présent sur le site'
      ), array('class' => 'photo'));

  	$this->widgetSchema['publication_start'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'date_widget' => new sfWidgetFormI18nDate(array('culture' => 'fr')),
      'culture' => 'fr'
    ));

  	$this->widgetSchema['publication_end'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'date_widget' => new sfWidgetFormI18nDate(array('culture' => 'fr')),
      'culture' => 'fr'
    ));
    
	  $this->validatorSchema['url'] = new sfValidatorFile(array(
		  'required' => false,
		  'path' => sfConfig::get('sf_upload_dir').'/photo',
		  'mime_types' => 'web_images',
	));
	  
	
	$this->validatorSchema['title'] = new sfValidatorString(array('required' => true));
	$this->validatorSchema['description'] = new sfValidatorString(array('required' => false));
  }
}
