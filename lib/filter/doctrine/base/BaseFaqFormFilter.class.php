<?php

/**
 * Faq filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFaqFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'position'        => new sfWidgetFormFilterInput(),
      'faq_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('faqCategory'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'position'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'faq_category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('faqCategory'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('faq_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faq';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'position'        => 'Number',
      'faq_category_id' => 'ForeignKey',
    );
  }
}
