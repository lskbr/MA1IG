<?php

require_once dirname(__FILE__) . '/../lib/staticpageGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/staticpageGeneratorHelper.class.php';

/**
 * staticpage actions.
 *
 * @package    grainedevie
 * @subpackage staticpage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticpageActions extends autoStaticpageActions {

    public function executeListMonter() {
        $result = StaticPage::monter($this->getRoute()->getObject());
        $this->printResult($result);
    }

    public function executeListDescendre() {
        $result = StaticPage::Descendre($this->getRoute()->getObject());
        $this->printResult($result);
    }

        private function printResult($result) {
        if ($result) {
            $this->getUser()->setFlash('notice', 'Position de la page changée');
        } else {
            $this->getUser()->setFlash('error', 'Impossible de changer la position de la page');
        }

        $this->redirect('static_page');
    }

}
