<?php

/**
 * FaqTranslation form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FaqTranslationForm extends BaseFaqTranslationForm
{
  public function configure()
  {
  	$this->widgetSchema['question']->setLabel("Question");
  	$this->widgetSchema['answer']->setLabel("Réponse");
  	$this->widgetSchema['is_activated']->setLabel("Actif");
  }
}
