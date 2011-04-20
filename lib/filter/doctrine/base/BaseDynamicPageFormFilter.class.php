<?php

/**
 * DynamicPage filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDynamicPageFormFilter extends PageFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['route'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['route'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['boolean_configuation_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BooleanConfiguration'), 'add_empty' => true));
    $this->validatorSchema['boolean_configuation_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BooleanConfiguration'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('dynamic_page_filters[%s]');
  }

  public function getModelName()
  {
    return 'DynamicPage';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'route' => 'Text',
      'boolean_configuation_id' => 'ForeignKey',
    ));
  }
}
