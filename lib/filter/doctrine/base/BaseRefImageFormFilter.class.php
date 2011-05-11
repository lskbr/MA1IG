<?php

/**
 * RefImage filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRefImageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'        => new sfWidgetFormFilterInput(),
      'code'       => new sfWidgetFormFilterInput(),
      'payment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('payment'), 'add_empty' => true)),
      'lang_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => true)),
      'param_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RefImageParam'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'url'        => new sfValidatorPass(array('required' => false)),
      'code'       => new sfValidatorPass(array('required' => false)),
      'payment_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('payment'), 'column' => 'id')),
      'lang_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Language'), 'column' => 'id')),
      'param_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RefImageParam'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ref_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefImage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'url'        => 'Text',
      'code'       => 'Text',
      'payment_id' => 'ForeignKey',
      'lang_id'    => 'ForeignKey',
      'param_id'   => 'ForeignKey',
    );
  }
}
