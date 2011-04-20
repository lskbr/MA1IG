<?php

/**
 * DynamicPage form base class.
 *
 * @method DynamicPage getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDynamicPageForm extends PageForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['route'] = new sfWidgetFormInputText();
    $this->validatorSchema['route'] = new sfValidatorString(array('max_length' => 255));

    $this->widgetSchema   ['boolean_configuation_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BooleanConfiguration'), 'add_empty' => false));
    $this->validatorSchema['boolean_configuation_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BooleanConfiguration')));

    $this->widgetSchema->setNameFormat('dynamic_page[%s]');
  }

  public function getModelName()
  {
    return 'DynamicPage';
  }

}
