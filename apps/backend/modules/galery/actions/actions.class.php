<?php

require_once dirname(__FILE__).'/../lib/galeryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/galeryGeneratorHelper.class.php';

/**
 * galery actions.
 *
 * @package    grainedevie
 * @subpackage galery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galeryActions extends autoGaleryActions
{
	public function executeListMonter(sfWebRequest $request) {
        $result = Galery::monter($this->getRoute()->getObject());
        $this->printResult($result);
    }
    
    public function executeListDescendre(sfWebRequest $request){
        $result = Galery::descendre($this->getRoute()->getObject());
        $this->printResult($result);
    }

    public function executeActivateToggle(sfWebRequest $request){
        $result = Galery::activateToggle($this->getRoute()->getObject());
        $this->redirect('galery');
    }

    public function executeIndex(sfWebRequest $request){ 
        //$this->getResponse()->setSlot('min_galery',  Galery::getFirstPosition());
        //$this->getResponse()->setSlot('max_galery',  Galery::getLastPosition());      
        //$this->getResponse()->setSlot('min_galery',  0);
        //$this->getResponse()->setSlot('max_galery',  1000);
        parent::executeIndex($request);
    }

    private function printResult($result) {
        if ($result) {
            $this->getUser()->setFlash('notice', 'Position dans le menu modifiée');
        } else {
            $this->getUser()->setFlash('error', 'Impossible de changer la position dans le menu');
        }
        $this->redirect('galery');
    }
}
