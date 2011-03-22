<?php

/**
 * Language form base class.
 *
 * @method Language getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLanguageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'abbreviation' => new sfWidgetFormInputText(),
      'flag'         => new sfWidgetFormInputText(),
      'is_activated' => new sfWidgetFormInputCheckbox(),
      'is_default'   => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 40)),
      'abbreviation' => new sfValidatorString(array('max_length' => 5)),
      'flag'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_activated' => new sfValidatorBoolean(array('required' => false)),
      'is_default'   => new sfValidatorBoolean(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Language', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Language', 'column' => array('abbreviation'))),
      ))
    );

    $this->widgetSchema->setNameFormat('language[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Language';
  }

}
