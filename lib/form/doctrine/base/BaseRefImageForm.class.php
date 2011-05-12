<?php

/**
 * RefImage form base class.
 *
 * @method RefImage getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRefImageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'url'        => new sfWidgetFormInputText(),
      'code'       => new sfWidgetFormTextarea(),
      'payment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('payment'), 'add_empty' => true)),
      'lang_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => true)),
      'param_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RefImageParam'), 'add_empty' => true)),
      'slogan'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'url'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'code'       => new sfValidatorString(array('required' => false)),
      'payment_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('payment'), 'required' => false)),
      'lang_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'required' => false)),
      'param_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RefImageParam'), 'required' => false)),
      'slogan'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefImage';
  }

}
