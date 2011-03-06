<?php

/**
 * Configuration form base class.
 *
 * @method Configuration getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConfigurationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormInputText(),
      'configuration_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BooleanConfiguration'), 'add_empty' => true)),
      'type'             => new sfWidgetFormInputText(),
      'is_kernel'        => new sfWidgetFormInputCheckbox(),
      'is_activated'     => new sfWidgetFormInputCheckbox(),
      'value'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'configuration_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BooleanConfiguration'), 'required' => false)),
      'type'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_kernel'        => new sfValidatorBoolean(array('required' => false)),
      'is_activated'     => new sfValidatorBoolean(array('required' => false)),
      'value'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Configuration', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('configuration[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuration';
  }

}
