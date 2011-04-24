<?php

/**
 * CounterTranslation form base class.
 *
 * @method CounterTranslation getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCounterTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'slogan_part1'  => new sfWidgetFormInputText(),
      'slogan_part2'  => new sfWidgetFormInputText(),
      'donation_text' => new sfWidgetFormInputText(),
      'lang'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'slogan_part1'  => new sfValidatorString(array('max_length' => 255)),
      'slogan_part2'  => new sfValidatorString(array('max_length' => 255)),
      'donation_text' => new sfValidatorString(array('max_length' => 255)),
      'lang'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('counter_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CounterTranslation';
  }

}
