<?php

/**
 * NewsComments form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsCommentsForm extends BaseNewsCommentsForm
{
  public function configure()
  {
  	unset($this['created_at'],$this['updated_at']);
  	$widget_schema = $this->getWidgetSchema();
    $widget_schema['news_id'] = new sfWidgetFormInputHidden();
    $widget_schema['father_id'] = new sfWidgetFormInputHidden();
    $widget_schema['author_id'] = new sfWidgetFormInputHidden();
  	$this->setWidget('content',new sfWidgetFormTextarea(array(), array('size' => '30x8')));
  	$this->widgetSchema->setLabels(array('content',''));
  }
}