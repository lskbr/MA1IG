<?php

/**
 * News form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{
  public function configure()
  {
  	unset($this['is_activated']);
  	$this->widgetSchema['publication_date'] = new sfWidgetFormJQueryDate(array(
            'image'=>'/images/calendar.png',
            'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
            'culture' => 'fr'
            ));
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
        $this->widgetSchema->setLabels(array(
            'title' => 'Titre de la news :',
            'language_id' => 'Langue :',
            'content' => 'Contenu :',
            'publication_date' => 'Date à partir de laquelle la news sera visible sur le site si elle a été publiée :',
            'comments_activated' => 'Est-ce que la news peut être commentée ?'
        ));
  }
}
