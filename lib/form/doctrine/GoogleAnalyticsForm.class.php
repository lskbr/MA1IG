<?php

/**
 * GoogleAnalytics form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GoogleAnalyticsForm extends BaseGoogleAnalyticsForm
{
  public function configure()
  {
      $this->widgetSchema['code'] = new sfWidgetFormTextarea(array(), array('cols' => 200, 'rows' => 20));
  }
}
