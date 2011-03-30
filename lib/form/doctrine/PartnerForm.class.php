<?php

/**
 * Partner form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PartnerForm extends BasePartnerForm
{
  public function configure()
  {
		$this->getWidgetSchema()->getFormFormatter()->setHelpFormat('%help%');
		unset($this['position']);
		$this->widgetSchema->setLabels(array(
		  'company_name'    => 'Nom de la société :',
		  'description'      => 'Description de la société :'
		));
		$this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
	      'label'     => 'Logo :',
	      'file_src'  => '/uploads/logos/'.$this->getObject()->getLogo(),
	      'is_image'  => true,
	      'with_delete' => true,
	      'edit_mode' => true,
	      'delete_label' => 'Supprimer le fichier actuellement présent sur le site'
	    ), array('class' => 'edit_logo'));

	    $this->validatorSchema['logo'] = new sfValidatorFile(array(
	      'required'   => false,
	      'path'       => sfConfig::get('sf_upload_dir').'/logos',
	      'mime_types' => 'web_images'
	    ));

    	$this->validatorSchema['path_delete'] = new sfValidatorBoolean();

    	
		$languages=Doctrine_Query::create()->from('Language l')->execute();
		$lang_abb=array();
		foreach($languages as $lang)
			$lang_abb[]=$lang->getAbbreviation();
		sfContext::getInstance()->getUser()->setculture('fr');
		$this->embedI18n($lang_abb);
		foreach($languages as $lang)
			$this->widgetSchema->setLabel($lang->getAbbreviation(),$lang->getName());
  }
}
