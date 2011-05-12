<?php

/**
 * RefImageParam filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRefImageParamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'   => new sfWidgetFormFilterInput(),
      'text1' => new sfWidgetFormFilterInput(),
      'text2' => new sfWidgetFormFilterInput(),
      'text3' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RefTextParam'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'url'   => new sfValidatorPass(array('required' => false)),
      'text1' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'text2' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'text3' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RefTextParam'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ref_image_param_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefImageParam';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'url'   => 'Text',
      'text1' => 'Number',
      'text2' => 'Number',
      'text3' => 'ForeignKey',
    );
  }
}
