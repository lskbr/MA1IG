<?php

/**
 * StringConfiguration filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStringConfigurationFormFilter extends ConfigurationFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('string_configuration_filters[%s]');
  }

  public function getModelName()
  {
    return 'StringConfiguration';
  }
}
