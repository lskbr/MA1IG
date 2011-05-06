<?php

/**
 * payment form base class.
 *
 * @method payment getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasepaymentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'brut_amout' => new sfWidgetFormInputText(),
      'fee'        => new sfWidgetFormInputText(),
      'date'       => new sfWidgetFormInputText(),
      'paypal_id'  => new sfWidgetFormInputText(),
      'person_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Person'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'brut_amout' => new sfValidatorNumber(),
      'fee'        => new sfValidatorNumber(),
      'date'       => new sfValidatorString(array('max_length' => 255)),
      'paypal_id'  => new sfValidatorString(array('max_length' => 255)),
      'person_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Person'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'payment', 'column' => array('paypal_id')))
    );

    $this->widgetSchema->setNameFormat('payment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'payment';
  }

}
