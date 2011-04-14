<?php

/**
 * Partner filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePartnerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'logo'        => new sfWidgetFormFilterInput(),
      'position'    => new sfWidgetFormFilterInput(),
      'visit_count' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'logo'        => new sfValidatorPass(array('required' => false)),
      'position'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visit_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('partner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partner';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'logo'        => 'Text',
      'position'    => 'Number',
      'visit_count' => 'Number',
    );
  }
}
