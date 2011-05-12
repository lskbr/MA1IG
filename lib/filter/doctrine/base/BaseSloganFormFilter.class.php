<?php

/**
 * Slogan filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSloganFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Counter'), 'add_empty' => true)),
      'type' => new sfWidgetFormChoice(array('choices' => array('' => '', 'counter' => 'counter', 'refimg' => 'refimg'))),
      'flag' => new sfWidgetFormChoice(array('choices' => array('' => '', 'position 1' => 'position 1', 'position 2' => 'position 2', 'position 3' => 'position 3'))),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Counter'), 'column' => 'id')),
      'type' => new sfValidatorChoice(array('required' => false, 'choices' => array('counter' => 'counter', 'refimg' => 'refimg'))),
      'flag' => new sfValidatorChoice(array('required' => false, 'choices' => array('position 1' => 'position 1', 'position 2' => 'position 2', 'position 3' => 'position 3'))),
    ));

    $this->widgetSchema->setNameFormat('slogan_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slogan';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'name' => 'ForeignKey',
      'type' => 'Enum',
      'flag' => 'Enum',
    );
  }
}
