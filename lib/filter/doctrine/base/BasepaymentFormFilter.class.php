<?php

/**
 * payment filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasepaymentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'brut_amout' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fee'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paypal_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'person_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Person'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'brut_amout' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fee'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date'       => new sfValidatorPass(array('required' => false)),
      'paypal_id'  => new sfValidatorPass(array('required' => false)),
      'person_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Person'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('payment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'payment';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'brut_amout' => 'Number',
      'fee'        => 'Number',
      'date'       => 'Text',
      'paypal_id'  => 'Text',
      'person_id'  => 'ForeignKey',
    );
  }
}
