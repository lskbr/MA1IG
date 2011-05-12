<?php

/**
 * Counter filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCounterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'initial_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'initial_number'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'period'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'objective_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slogan'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slogan'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'initial_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'initial_number'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'period'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'objective_number' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slogan'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Slogan'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('counter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Counter';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'initial_date'     => 'Date',
      'initial_number'   => 'Number',
      'period'           => 'Number',
      'objective_number' => 'Number',
      'slogan'           => 'ForeignKey',
    );
  }
}
