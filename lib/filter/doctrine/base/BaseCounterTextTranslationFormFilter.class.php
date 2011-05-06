<?php

/**
 * CounterTextTranslation filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCounterTextTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slogan1'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slogan2'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'donation' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'slogan1'  => new sfValidatorPass(array('required' => false)),
      'slogan2'  => new sfValidatorPass(array('required' => false)),
      'donation' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('counter_text_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CounterTextTranslation';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'slogan1'  => 'Text',
      'slogan2'  => 'Text',
      'donation' => 'Text',
      'lang'     => 'Text',
    );
  }
}
