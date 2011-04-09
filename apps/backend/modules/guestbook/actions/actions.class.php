<?php

require_once dirname(__FILE__).'/../lib/guestbookGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/guestbookGeneratorHelper.class.php';

/**
 * guestbook actions.
 *
 * @package    grainedevie
 * @subpackage guestbook
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class guestbookActions extends autoGuestbookActions
{
	public function executeEnable(sfWebRequest $request)
	{
		$guestBook = $this->getRoute()->getObject();
		$guestBook->enable();
		$this->getUser()->setFlash('notice', 'Le message à été validé et pourra apparaître sur le site.');
 		$this->redirect('guestbook');
	}
	public function executeDisable(sfWebRequest $request)
	{
		$guestBook = $this->getRoute()->getObject();
		$guestBook->disable();
		$this->getUser()->setFlash('notice', 'Le message à été invalidé et n\'apparaîtra plus sur le site.');
 		$this->redirect('guestbook');
	}
}
