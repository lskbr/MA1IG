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
      'flag' => new sfWidgetFormChoice(array('choices' => array('' => '', 'text1' => 'text1', 'text2' => 'text2', 'text3' => 'text3'))),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Counter'), 'column' => 'id')),
      'flag' => new sfValidatorChoice(array('required' => false, 'choices' => array('text1' => 'text1', 'text2' => 'text2', 'text3' => 'text3'))),
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
      'flag' => 'Enum',
    );
  }
}
