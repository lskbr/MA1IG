<?php

/**
 * GoogleAnalytics filter form base class.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGoogleAnalyticsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'code' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('google_analytics_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GoogleAnalytics';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'code' => 'Text',
    );
  }
}
