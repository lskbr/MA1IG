<?php

require_once dirname(__FILE__) . '/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    grainedevie
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends autoCategoryActions {

    public function executeListMonter(sfWebRequest $request) {

        $result = Category::monter($this->getRoute()->getObject());
        $this->printResult($result);
    }
    
    public function executeListDescendre(sfWebRequest $request){
        $result = Category::descendre($this->getRoute()->getObject());
        $this->printResult($result);
    }

    private function printResult($result) {
        if ($result) {
            $this->getUser()->setFlash('notice', 'Position dans le menu modifiée');
        } else {
            $this->getUser()->setFlash('error', 'Impossible de changer la position dans le menu');
        }

        $this->redirect('category');
    }

}
