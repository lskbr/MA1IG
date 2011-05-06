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
      'id'            => new sfWidgetFormInputHidden(),
      'text'          => new sfWidgetFormInputText(),
      'is_saved'      => new sfWidgetFormInputCheckbox(),
      'read_at'       => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormInputText(),
      'reply_at'      => new sfWidgetFormInputText(),
      'comment_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('comment'), 'add_empty' => true)),
      'sender_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sender'), 'add_empty' => true)),
      'category_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('faqCategory'), 'add_empty' => false)),
      'folder_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Folder'), 'add_empty' => false)),
      'forward_to_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ForwardTo'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'text'          => new sfValidatorPass(),
      'is_saved'      => new sfValidatorBoolean(array('required' => false)),
      'read_at'       => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorPass(),
      'reply_at'      => new sfValidatorPass(array('required' => false)),
      'comment_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('comment'), 'required' => false)),
      'sender_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sender'), 'required' => false)),
      'category_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('faqCategory'))),
      'folder_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Folder'), 'required' => false)),
      'forward_to_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ForwardTo'))),
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
