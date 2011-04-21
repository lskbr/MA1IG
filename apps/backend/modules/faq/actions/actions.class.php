<?php

require_once dirname(__FILE__).'/../lib/faqGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/faqGeneratorHelper.class.php';

/**
 * faq actions.
 *
 * @package    grainedevie
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends autoFaqActions
{
    public function executeListMonter(sfWebRequest $request) {

        $result = Faq::monter($this->getRoute()->getObject());
        $this->printResult($result);
    }
    
    public function executeListDescendre(sfWebRequest $request){
        $result = Faq::descendre($this->getRoute()->getObject());
        $this->printResult($result);
    }

    public function executeActivateToggle(sfWebRequest $request){
        $result = Faq::activateToggle($this->getRoute()->getObject());
        $this->redirect('faq');
    }

    private function printResult($result) {
        if ($result) {
            $this->getUser()->setFlash('notice', 'Position de la FAQ modifiée');
        } else {
            $this->getUser()->setFlash('error', 'Impossible de changer la position de la FAQ');
        }

        $this->redirect('faq');
    }
}
