<?php

/**
 * NumericConfiguration form base class.
 *
 * @method NumericConfiguration getObject() Returns the current form's model object
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNumericConfigurationForm extends ConfigurationForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['value'] = new sfWidgetFormInputText();
    $this->validatorSchema['value'] = new sfValidatorInteger();

    $this->widgetSchema->setNameFormat('numeric_configuration[%s]');
  }

  public function getModelName()
  {
    return 'NumericConfiguration';
  }

}
