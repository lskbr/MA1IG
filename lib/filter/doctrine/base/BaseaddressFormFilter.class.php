<?php

/**
 * address filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseaddressFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'street'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zip_code'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Person'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'street'    => new sfValidatorPass(array('required' => false)),
      'country'   => new sfValidatorPass(array('required' => false)),
      'city'      => new sfValidatorPass(array('required' => false)),
      'zip_code'  => new sfValidatorPass(array('required' => false)),
      'person_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Person'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('address_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'address';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'street'    => 'Text',
      'country'   => 'Text',
      'city'      => 'Text',
      'zip_code'  => 'Text',
      'person_id' => 'ForeignKey',
    );
  }
}
