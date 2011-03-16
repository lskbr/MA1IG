<?php

/**
 * StaticPage form base class.
 *
 * @method StaticPage getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStaticPageForm extends PageForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['content'] = new sfWidgetFormInputText();
    $this->validatorSchema['content'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['is_activated'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['is_activated'] = new sfValidatorBoolean(array('required' => false));

    $this->widgetSchema   ['title'] = new sfWidgetFormInputText();
    $this->validatorSchema['title'] = new sfValidatorString(array('max_length' => 255));

    $this->widgetSchema->setNameFormat('static_page[%s]');
  }

  public function getModelName()
  {
    return 'StaticPage';
  }

}
