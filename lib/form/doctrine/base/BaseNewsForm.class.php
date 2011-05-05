<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNewsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'title'              => new sfWidgetFormInputText(),
      'content'            => new sfWidgetFormInputText(),
      'is_activated'       => new sfWidgetFormInputCheckbox(),
      'language_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => false)),
      'publication_date'   => new sfWidgetFormDateTime(),
      'comments_activated' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'              => new sfValidatorPass(),
      'content'            => new sfValidatorPass(array('required' => false)),
      'is_activated'       => new sfValidatorBoolean(array('required' => false)),
      'language_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Language'))),
      'publication_date'   => new sfValidatorDateTime(array('required' => false)),
      'comments_activated' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }

}
