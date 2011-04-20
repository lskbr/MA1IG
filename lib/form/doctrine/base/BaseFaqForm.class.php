<?php

/**
 * Faq form base class.
 *
 * @method Faq getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFaqForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'position'        => new sfWidgetFormInputText(),
      'faq_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('faqCategory'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'position'        => new sfValidatorInteger(array('required' => false)),
      'faq_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('faqCategory'))),
    ));

    $this->widgetSchema->setNameFormat('faq[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faq';
  }

}
