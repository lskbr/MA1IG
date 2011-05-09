<?php

/**
 * Slogan form base class.
 *
 * @method Slogan getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSloganForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Counter'), 'add_empty' => true)),
      'flag' => new sfWidgetFormChoice(array('choices' => array('text1' => 'text1', 'text2' => 'text2', 'text3' => 'text3'))),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Counter'), 'required' => false)),
      'flag' => new sfValidatorChoice(array('choices' => array(0 => 'text1', 1 => 'text2', 2 => 'text3'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Slogan', 'column' => array('name', 'flag')))
    );

    $this->widgetSchema->setNameFormat('slogan[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slogan';
  }

}
