<?php

require_once dirname(__FILE__) . '/../lib/contactavancesGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/contactavancesGeneratorHelper.class.php';

/**
 * contactavances actions.
 *
 * @package    grainedevie
 * @subpackage contactavances
 * @author     Laurent
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactavancesActions extends autoContactavancesActions {

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($message = Doctrine_Core::getTable('message')->find(array($request->getParameter('id'))), sprintf('Object message does not exist (%s).', $request->getParameter('id')));
        $this->forward404Unless(Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated());
        $message->readed(date('Y-m-d H:i:s'));
        $this->form = new MessageAdminForm($message);
        $this->message = $message;
        $message->save();
    }

    public function executeNew(sfWebRequest $request) {
        $this->forward404();
    }

    public function executeIndex(sfWebRequest $request) {
        $this->forward404Unless(Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated());
        parent::executeIndex($request);
    }

    public function executeShow(sfWebRequest $request) {
        $this->forward404Unless(Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated());
        parent::executeShow($request);
    }

    public function executeDelete(sfWebRequest $request) {
        $this->forward404Unless(Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated());
        parent::executeDelete($request);
    }

    public function executeView(sfWebRequest $request) {
        $this->forward404Unless(Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated());
        parent::executeView($request);
    }

    public function executeChangeFolder(sfWebRequest $request) {
        $this->forward404unless($request->isXmlHttpRequest());
        $messageId = $request->getParameter('messageId');
        $folderId = $request->getParameter('folderId');
        $message = Doctrine_Core::getTable('message')->createQuery()->where('id = ?', $messageId)->fetchOne();
        $message->setFolderId($folderId);
        $message->save();
        $this->message = $message;
    }

    public function executeDelegateTo(sfWebRequest $request) {
        $this->forward404unless($request->isXmlHttpRequest());
        $delegateId = $request->getParameter('delegateId');
        $messageId = $request->getParameter('messageId');
        $message = Doctrine_Core::getTable('message')->createQuery()->where('id = ?', $messageId)->fetchOne();
        $message->setForwardToId($delegateId);
        $message->save();
        $this->message = $message;
    }

    public function executeInsertFromFaq(sfWebRequest $request){

    }
	
	public function executeSendMail(sfWebRequest $request){
		$this->forward404Unless($message = Doctrine_Core::getTable('message')->find(array($request->getParameter('id'))), sprintf('Object message does not exist (%s).', $request->getParameter('id')));
		$this->executeUpdate($request);
		$mail= $this->getMailer()->compose(array ('info@grainedevie.seaflat.be'=>'Graine de Vie'),$message->getSender()->getEmailAddress(),'RE: Graine de Vie',$message->getText());
		$this->getMailer()->send($mail);
		
	}

}
