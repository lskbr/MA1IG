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

    private function executeSendMail(sfWebRequest $request) {
        $this->forward404Unless($message = Doctrine_Core::getTable('message')->find(array($request->getParameter('id'))), sprintf('Object message does not exist (%s).', $request->getParameter('id')));
        $tab = $request->getPostParameter('message');
        $mail = $this->getMailer()->compose(array('info@grainedevie.seaflat.be' => 'Graine de Vie'), $message->getSender()->getEmailAddress(), 'RE: Graine de Vie', $tab['text']);
        $this->getMailer()->send($mail);
        $message->setReplyAt(date('Y-m-d H:i:s'));
        $message->save();
    }

    public function executeUpdate(sfWebRequest $request) {
        if ($request->hasParameter('_now')) {
            $this->executeSendMail($request);
        }
        parent::executeUpdate($request);
        $this->forward('contactavances', 'index');
    }

    public function preExecute() {
        $this->dispatcher->connect(
                'admin.build_query',
                array($this, 'myMessages')
        );
        parent::preExecute();
    }

    public function myMessages($event, Doctrine_Query $query) {
        return $query->where('forward_to_id = ?', $this->getUser()->getPerson()->getId());
    }

}

