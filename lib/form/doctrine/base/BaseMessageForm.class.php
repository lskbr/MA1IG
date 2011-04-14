<?php

/**
 * Message form base class.
 *
 * @method Message getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'text'       => new sfWidgetFormInputText(),
      'is_saved'   => new sfWidgetFormInputCheckbox(),
      'read_at'    => new sfWidgetFormDate(),
      'created_at' => new sfWidgetFormDate(),
      'reply_at'   => new sfWidgetFormDate(),
      'comment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Comment'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'text'       => new sfValidatorPass(),
      'is_saved'   => new sfValidatorBoolean(array('required' => false)),
      'read_at'    => new sfValidatorDate(array('required' => false)),
      'created_at' => new sfValidatorDate(),
      'reply_at'   => new sfValidatorDate(array('required' => false)),
      'comment_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Comment'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Message';
  }

}
