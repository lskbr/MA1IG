<?php

/**
 * RefTextParam filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRefTextParamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'x'         => new sfWidgetFormFilterInput(),
      'y'         => new sfWidgetFormFilterInput(),
      'width'     => new sfWidgetFormFilterInput(),
      'font_size' => new sfWidgetFormFilterInput(),
      'color'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'x'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'width'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'font_size' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_text_param_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefTextParam';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'x'         => 'Number',
      'y'         => 'Number',
      'width'     => 'Number',
      'font_size' => 'Number',
      'color'     => 'Text',
    );
  }
}
