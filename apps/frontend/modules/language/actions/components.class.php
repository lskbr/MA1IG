<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author laurent
 */
class languageComponents extends sfComponents {

    public function executeLanguage(sfWebRequest $request) {
        $this->form = new sfFormLanguage(
                        $this->getUser(),
                        array('languages' => array('en', 'fr'))
        );
    }

}

?>
