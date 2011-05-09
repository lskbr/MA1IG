<?php

/**
 * language actions.
 *
 * @package    grainedevie
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class languageActions extends sfActions {
    public function executeChangeLanguage(sfWebRequest $request) {
        $languages=Doctrine_Query::create()->from('Language l')->where("is_activated = ?",true)->execute();
        $lang_abb=array();
        foreach($languages as $lang)
            $lang_abb[]=$lang->getAbbreviation();
        $form = new sfFormLanguage(
                $this->getUser(),
                array('languages' => $lang_abb)
        );
        
        $form->process($request);

        return $this->redirect('localized_homepage');
    }
}