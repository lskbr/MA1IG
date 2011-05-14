<?php

/**
 * PhotoTranslation form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoTranslationForm extends BasePhotoTranslationForm
{
  public function configure()
  {
    $this->widgetSchema['title']->setLabel("Titre");
    $this->widgetSchema['description']->setLabel("Déscription");
  }
}
