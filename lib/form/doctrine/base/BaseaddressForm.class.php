<?php

/**
 * address form base class.
 *
 * @method address getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseaddressForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'street'    => new sfWidgetFormInputText(),
      'country'   => new sfWidgetFormInputText(),
      'city'      => new sfWidgetFormInputText(),
      'zip_code'  => new sfWidgetFormInputText(),
      'person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Person'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'street'    => new sfValidatorString(array('max_length' => 255)),
      'country'   => new sfValidatorString(array('max_length' => 255)),
      'city'      => new sfValidatorString(array('max_length' => 255)),
      'zip_code'  => new sfValidatorString(array('max_length' => 10)),
      'person_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Person'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'address';
  }

}
