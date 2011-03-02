<?php

/**
 * StaticPage filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStaticPageFormFilter extends PageFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['content'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['content'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['is_activated'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
    $this->validatorSchema['is_activated'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

    $this->widgetSchema   ['title'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['title'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('static_page_filters[%s]');
  }

  public function getModelName()
  {
    return 'StaticPage';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'content' => 'Text',
      'is_activated' => 'Boolean',
      'title' => 'Text',
    ));
  }
}
