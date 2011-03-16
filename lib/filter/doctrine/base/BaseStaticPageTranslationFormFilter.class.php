<?php

/**
 * StaticPageTranslation filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStaticPageTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'menu_title' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'menu_title' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('static_page_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StaticPageTranslation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'menu_title' => 'Text',
      'lang'       => 'Text',
    );
  }
}
