<?php
class BackendLanguageForm extends LanguageForm
{
	public function configure()
	{
		$this->getWidgetSchema()->getFormFormatter()->setHelpFormat('%help%');
		unset($this['created_at'], $this['updated_at'], $this['is_activated'], $this['is_default']);
		$this->widgetSchema->setLabels(array(
		  'name'    => 'Nom de la langue :',
		  'abbreviation'      => 'Version raccourcie :'
		));
		$this->widgetSchema['flag'] = new sfWidgetFormInputFileEditable(array(
	      'label'     => 'Drapeau :',
	      'file_src'  => '/uploads/flags/'.$this->getObject()->getFlag(),
	      'is_image'  => true,
	      'with_delete' => true,
	      'edit_mode' => !$this->isNew(),
	      'delete_label' => 'Supprimer le fichier actuellement présent sur le site'
	    ), array('class' => 'edit_flag'));

	    $this->validatorSchema['flag'] = new sfValidatorFile(array(
	      'required'   => false,
	      'path'       => sfConfig::get('sf_upload_dir').'/flags',
	      'mime_types' => 'web_images'
	    ));

    	$this->validatorSchema['path_delete'] = new sfValidatorBoolean();
	    $this->widgetSchema->setHelp('abbreviation', 'L\'abréviation est généralement de deux lettres.');
	    $this->widgetSchema->setHelp('name','La langue doit être indiqué dans la langue elle même.');
	}
}