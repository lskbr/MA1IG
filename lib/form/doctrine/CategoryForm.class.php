<?php

/**
 * Category form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm {

    public function configure() {
        unset(
                $this['created_at'], $this['updated_at'], $this['position']
        );
        $languages=Doctrine_Query::create()->from('Language l')->execute();
        $lang_abb=array();
        foreach($languages as $lang)
        	$lang_abb[]=$lang->getAbbreviation();
        sfContext::getInstance()->getUser()->setculture('fr');
        $this->embedI18n($lang_abb);
        foreach($languages as $lang)
        	$this->widgetSchema->setLabel($lang->getAbbreviation(),$lang->getName());
    }

}
