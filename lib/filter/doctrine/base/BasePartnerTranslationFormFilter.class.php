<?php

/**
 * PartnerTranslation filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePartnerTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'company_name' => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'site'         => new sfWidgetFormFilterInput(),
      'is_visible'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'company_name' => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'site'         => new sfValidatorPass(array('required' => false)),
      'is_visible'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('partner_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PartnerTranslation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'company_name' => 'Text',
      'description'  => 'Text',
      'site'         => 'Text',
      'is_visible'   => 'Boolean',
      'lang'         => 'Text',
    );
  }
}
