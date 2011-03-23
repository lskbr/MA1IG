<?php

/**
 * StaticPageTranslation form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StaticPageTranslationForm extends BaseStaticPageTranslationForm {

    public function configure() {
        /*
         * Gestion des widget et validateurs
         */
        $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE(
                        array(
                            'width' => 550,
                            'height' => 350,
                            'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',
                            'theme' => sfConfig::get('app_tinymce_theme', 'advanced'),
                        ),
                        array(
                            'class' => 'tiny_mce'
                        )
        );
        $js_path = sfConfig::get('sf_rich_text_js_dir') ? '/' . sfConfig::get('sf_rich_text_js_dir') . '/tiny_mce.js' : '/sf/tinymce/js/tiny_mce.js';
        sfContext::getInstance()->getResponse()->addJavascript($js_path);

        /*
         * Gestion des traductions
         */
        $this->widgetSchema->setLabels(array(
            'menu_title' => 'Titre a afficher dans le menu',
            'title' => 'Titre de la page',
            'content' => 'contenu de la page',
            'is_activated' => 'Visible ?'
        ));
    }

}

