<?php

/**
 * Guestbook filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGuestbookFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'content'      => new sfWidgetFormFilterInput(),
      'is_validated' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'language_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'content'      => new sfValidatorPass(array('required' => false)),
      'is_validated' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'language_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Language'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('guestbook_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Guestbook';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'content'      => 'Text',
      'is_validated' => 'Boolean',
      'language_id'  => 'ForeignKey',
    );
  }
}
