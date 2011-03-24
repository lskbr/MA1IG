<?php

/**
 * Configuration filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConfigurationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'main'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'      => new sfWidgetFormFilterInput(),
      'configuration_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BooleanConfiguration'), 'add_empty' => true)),
      'type'             => new sfWidgetFormFilterInput(),
      'is_kernel'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_activated'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'value'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'main'             => new sfValidatorPass(array('required' => false)),
      'name'             => new sfValidatorPass(array('required' => false)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'configuration_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BooleanConfiguration'), 'column' => 'id')),
      'type'             => new sfValidatorPass(array('required' => false)),
      'is_kernel'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_activated'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'value'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('configuration_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuration';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'main'             => 'Text',
      'name'             => 'Text',
      'description'      => 'Text',
      'configuration_id' => 'ForeignKey',
      'type'             => 'Text',
      'is_kernel'        => 'Boolean',
      'is_activated'     => 'Boolean',
      'value'            => 'Number',
    );
  }
}
