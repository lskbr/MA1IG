<?php

/**
 * Corespondance form base class.
 *
 * @method Corespondance getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCorespondanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'first_mail'     => new sfWidgetFormInputText(),
      'last_mail'      => new sfWidgetFormInputText(),
      'number_of_mail' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_mail'     => new sfValidatorPass(array('required' => false)),
      'last_mail'      => new sfValidatorPass(array('required' => false)),
      'number_of_mail' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('corespondance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Corespondance';
  }

}
