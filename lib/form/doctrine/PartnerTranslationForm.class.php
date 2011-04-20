<?php

/**
 * PartnerTranslation form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PartnerTranslationForm extends BasePartnerTranslationForm
{
  public function configure()
  {
  	$this->setWidget('description',new sfWidgetFormTextarea(array(), array('size' => '20x5')));
  	$this->widgetSchema['company_name']->setLabel("Nom de la société");
  	$this->widgetSchema['description']->setLabel("Description de la société");
  	$this->widgetSchema['is_visible']->setLabel("Visible");
  }
}
