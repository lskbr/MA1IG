<?php

/**
 * BooleanConfiguration filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBooleanConfigurationFormFilter extends ConfigurationFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['is_kernel'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
    $this->validatorSchema['is_kernel'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

    $this->widgetSchema   ['is_activated'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
    $this->validatorSchema['is_activated'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

    $this->widgetSchema->setNameFormat('boolean_configuration_filters[%s]');
  }

  public function getModelName()
  {
    return 'BooleanConfiguration';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'is_kernel' => 'Boolean',
      'is_activated' => 'Boolean',
    ));
  }
}
