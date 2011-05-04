<?php

/**
 * StandardSentence filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStandardSentenceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'text'  => new sfWidgetFormFilterInput(),
      'title' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'text'  => new sfValidatorPass(array('required' => false)),
      'title' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('standard_sentence_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StandardSentence';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'text'  => 'Text',
      'title' => 'Text',
    );
  }
}
