<?php

/**
 * StaticPage filter form.
 *
 * @package    grainedevie
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StaticPageFormFilter extends BaseStaticPageFormFilter
{
  /**
   * @see PageFormFilter
   */
  public function configure()
  {
    parent::configure();

    $bDate = new sfWidgetFormJQueryDate(array('image'=>'/images/calendar.png','date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),'culture' => 'fr'));
    $eDate = new sfWidgetFormJQueryDate(array('image'=>'/images/calendar.png','date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),'culture' => 'fr'));

    $this->widgetSchema['publication_date'] = new sfWidgetFormFilterDate(array('from_date' => $bDate, 'to_date' => $eDate));





  }


}
