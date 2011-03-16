<?php

/**
 * Page filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash_code'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'publication_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'category_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'hash_code'        => new sfValidatorPass(array('required' => false)),
      'position'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'publication_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'category_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'hash_code'        => 'Text',
      'position'         => 'Number',
      'publication_date' => 'Date',
      'category_id'      => 'ForeignKey',
    );
  }
}
