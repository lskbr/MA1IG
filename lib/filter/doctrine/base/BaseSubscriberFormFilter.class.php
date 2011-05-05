<?php

/**
 * Subscriber filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubscriberFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email' => new sfWidgetFormFilterInput(),
      'hash'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'email' => new sfValidatorPass(array('required' => false)),
      'hash'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subscriber_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subscriber';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'email' => 'Text',
      'hash'  => 'Text',
    );
  }
}
