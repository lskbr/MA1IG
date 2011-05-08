<?php

/**
 * BilanCarboneCoeff form base class.
 *
 * @method BilanCarboneCoeff getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBilanCarboneCoeffForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name_short' => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'coeff'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name_short' => new sfValidatorString(array('max_length' => 255)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'coeff'      => new sfValidatorNumber(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BilanCarboneCoeff', 'column' => array('name_short')))
    );

    $this->widgetSchema->setNameFormat('bilan_carbone_coeff[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BilanCarboneCoeff';
  }

}
