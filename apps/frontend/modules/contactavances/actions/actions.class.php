<?php

/**
 * contactavances actions.
 *
 * @package    grainedevie
 * @subpackage contactavances
 * @author     Laurent
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactavancesActions extends sfActions {

    public function executeNew(sfWebRequest $request) {
        if (Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated()) {
            $printEmbed = $this->getUser()->isAuthenticated();
            $this->form = new MessageForm(null, null, null, !$printEmbed);

            if ($printEmbed) {
                $this->userName = $this->getUser()->getName();
                $this->mail = $this->getUser()->getEmail();
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new MessageForm(null, null, null, !$this->getUser()->isAuthenticated());

        if ($this->processForm($request, $this->form)) {
            $this->setTemplate('confirmation');
        } else {
            if ($this->getUser()->isAuthenticated()) {
                $this->userName = $this->getUser()->getName();
                $this->mail = $this->getUser()->getEmail();
            }
            $this->setTemplate('new');
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $message = $form->save();
            if ($message) {
                if ($this->getUser()->isAuthenticated()) {
                    $message->setSender($this->getUser()->getPerson());
                }
                $cor = $message->getSender()->getCorespondance();
                $cor->setLastMail(date('Y-m-d H:i:s'));
                $cor->setNumberOfMail($cor->getNumberOfMail()+1);
                if($cor->getFirstMail()==null){
                    $cor->setFirstMail(date('Y-m-d H:i:s'));
                    $message->getSender()->setCorespondance($cor);
                }else{
                    $cor->save();
                }
                
                $message->save();
                return true;
            }
        }

        return false;
    }

}
