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
        if($message->getComment() instanceof BaseComment){
            $comment = new Comment();
            $message->setCommentId($comment->getOid());
            $message->save();
        }
        $this->form = new MessageAdminForm($message);
        $this->message = $message;
        $message->readed(date('Y-m-d H:i:s'));
        $message->save();

        
    }

}
