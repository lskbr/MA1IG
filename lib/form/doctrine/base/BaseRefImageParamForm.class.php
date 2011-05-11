<?php

/**
 * RefImageParam form base class.
 *
 * @method RefImageParam getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRefImageParamForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'url'      => new sfWidgetFormInputText(),
      'text1'    => new sfWidgetFormInputText(),
      'text2'    => new sfWidgetFormInputText(),
      'text3'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RefTextParam'), 'add_empty' => true)),
      'slogan'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'add_empty' => true)),
      'coeff_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BilanCarboneCoeff'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'url'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'text1'    => new sfValidatorInteger(array('required' => false)),
      'text2'    => new sfValidatorInteger(array('required' => false)),
      'text3'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RefTextParam'), 'required' => false)),
      'slogan'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'required' => false)),
      'coeff_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BilanCarboneCoeff'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_image_param[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefImageParam';
  }

}
