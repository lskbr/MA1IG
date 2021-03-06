<?php

/**
 * Counter form base class.
 *
 * @method Counter getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCounterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'initial_date'     => new sfWidgetFormDateTime(),
      'initial_number'   => new sfWidgetFormInputText(),
      'period'           => new sfWidgetFormInputText(),
      'objective_number' => new sfWidgetFormInputText(),
      'slogan'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'initial_date'     => new sfValidatorDateTime(),
      'initial_number'   => new sfValidatorInteger(),
      'period'           => new sfValidatorInteger(),
      'objective_number' => new sfValidatorInteger(),
      'slogan'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('counter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Counter';
  }

}
