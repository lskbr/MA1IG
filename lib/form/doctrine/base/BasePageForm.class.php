<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'hash_code'        => new sfWidgetFormInputText(),
      'menu_title'       => new sfWidgetFormInputText(),
      'position'         => new sfWidgetFormInputText(),
      'publication_date' => new sfWidgetFormDateTime(),
      'category_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'language_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'hash_code'        => new sfValidatorString(array('max_length' => 255)),
      'menu_title'       => new sfValidatorString(array('max_length' => 255)),
      'position'         => new sfValidatorInteger(array('required' => false)),
      'publication_date' => new sfValidatorDateTime(array('required' => false)),
      'category_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'language_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Language'))),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

}
