<?php

/**
 * Subscriber form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubscriberForm extends BaseSubscriberForm
{
  public function configure()
  {
  	$widget_schema = $this->getWidgetSchema();
    $widget_schema['hash'] = new sfWidgetFormInputHidden();
  }
}
