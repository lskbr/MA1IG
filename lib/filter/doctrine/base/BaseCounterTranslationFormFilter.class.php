<?php

/**
 * CounterTranslation filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCounterTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slogan_part1'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slogan_part2'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'donation_text' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'slogan_part1'  => new sfValidatorPass(array('required' => false)),
      'slogan_part2'  => new sfValidatorPass(array('required' => false)),
      'donation_text' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('counter_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CounterTranslation';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'slogan_part1'  => 'Text',
      'slogan_part2'  => 'Text',
      'donation_text' => 'Text',
      'lang'          => 'Text',
    );
  }
}
