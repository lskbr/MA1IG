<?php

/**
 * Person form base class.
 *
 * @method Person getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'first_name'       => new sfWidgetFormInputText(),
      'last_name'        => new sfWidgetFormInputText(),
      'email_address'    => new sfWidgetFormInputText(),
      'corespondance_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Corespondance'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'       => new sfValidatorString(array('max_length' => 255)),
      'last_name'        => new sfValidatorString(array('max_length' => 255)),
      'email_address'    => new sfValidatorString(array('max_length' => 255)),
      'corespondance_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Corespondance'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Person', 'column' => array('email_address')))
    );

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

}
