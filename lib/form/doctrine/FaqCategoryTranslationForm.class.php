<?php

/**
 * FaqCategoryTranslation form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FaqCategoryTranslationForm extends BaseFaqCategoryTranslationForm
{
  public function configure()
  {
  	$this->widgetSchema->setLabels(array(
	  'name'    => 'Nom de la catégorie :'
	));
  }
}
