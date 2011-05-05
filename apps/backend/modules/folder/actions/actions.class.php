<?php

/**
 * folder actions.
 *
 * @package    grainedevie
 * @subpackage folder
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class folderActions extends autoFolderActions {

    public function executeDelete(sfWebRequest $request) {
        if ($request->getParameter('id') == '1') {
            $this->getUser()->setFlash("error", "Impossible de supprimer la boîte de réception");
            $this->executeIndex($request);
            $this->setTemplate('index');
        } else {
            if (Doctrine_Core::getTable('Message')->createQuery()->where('folder_id = ?', $request->getParameter('id'))->count() == 0) {
                parent::executeDelete($request);
            } else {
                $this->getUser()->setFlash("error", "Veuillez retirer tous les messages de ce dossier avant de le supprimer");
                $this->executeIndex($request);
                $this->setTemplate('index');
            }
        }
    }

}
