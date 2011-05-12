<?php

/**
 * RefTextParam form base class.
 *
 * @method RefTextParam getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRefTextParamForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'x'         => new sfWidgetFormInputText(),
      'y'         => new sfWidgetFormInputText(),
      'width'     => new sfWidgetFormInputText(),
      'font_size' => new sfWidgetFormInputText(),
      'color'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'x'         => new sfValidatorInteger(array('required' => false)),
      'y'         => new sfValidatorInteger(array('required' => false)),
      'width'     => new sfValidatorInteger(array('required' => false)),
      'font_size' => new sfValidatorInteger(array('required' => false)),
      'color'     => new sfValidatorString(array('max_length' => 6, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_text_param[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefTextParam';
  }

}
