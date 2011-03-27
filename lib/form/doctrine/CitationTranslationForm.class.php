<?php

/**
 * CitationTranslation form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CitationTranslationForm extends BaseCitationTranslationForm
{
  public function configure()
  {
  	$this->setWidget('content',new sfWidgetFormTextarea(array(), array('size' => '20x5')));
  	$this->widgetSchema['author']->setLabel("Auteur");
  	$this->widgetSchema['content']->setLabel("Citation");
  }
}
