<?php
class BackendLanguageForm extends LanguageForm
{
	public function configure()
	{
		unset($this['created_at'], $this['updated_at'], $this['is_activated'], $this['is_default']);
		$this->widgetSchema->setLabels(array(
		  'name'    => 'Nom de la langue :',
		  'abbreviation'      => 'Version raccourcie :'
		));
		$this->widgetSchema['flag'] = new sfWidgetFormInputFileEditable(array(
	      'label'     => 'Drapeau :',
	      'file_src'  => '/uploads/flags/'.$this->getObject()->getFlag(),
	      'is_image'  => true,
	      'with_delete' => true
	    ));

	    $this->validatorSchema['flag'] = new sfValidatorFile(array(
	      'required'   => false,
	      'path'       => sfConfig::get('sf_upload_dir').'/flags',
	      'mime_types' => 'web_images'
	    ));

    	$this->validatorSchema['path_delete'] = new sfValidatorBoolean();
	    $this->widgetSchema->setHelp('abbreviation', 'L\'abréviation est généralement de deux lettres.');
	}
}