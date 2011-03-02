<?php

/**
 * BooleanConfiguration form base class.
 *
 * @method BooleanConfiguration getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBooleanConfigurationForm extends ConfigurationForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['is_kernel'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['is_kernel'] = new sfValidatorBoolean(array('required' => false));

    $this->widgetSchema   ['is_activated'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['is_activated'] = new sfValidatorBoolean(array('required' => false));

    $this->widgetSchema->setNameFormat('boolean_configuration[%s]');
  }

  public function getModelName()
  {
    return 'BooleanConfiguration';
  }

}
