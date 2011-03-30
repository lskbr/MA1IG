<?php

require_once dirname(__FILE__).'/../lib/partnerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/partnerGeneratorHelper.class.php';

/**
 * partner actions.
 *
 * @package    grainedevie
 * @subpackage partner
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class partnerActions extends autoPartnerActions
{	
	public function executeEnable(sfWebRequest $request)
	{
		$part = $this->getRoute()->getObject();
		$part->enable();
		$this->getUser()->setFlash('notice', 'Le partenaire '.strtolower($part->getCompanyName()).' est désormais activé');
 		$this->redirect('partner');
	}
	public function executeDisable(sfWebRequest $request)
	{
		$part = $this->getRoute()->getObject();
		$part->disable();
		$this->getUser()->setFlash('notice', 'Le partenaire '.strtolower($part->getCompanyName()).' est désormais désactivé');
 		$this->redirect('partner');
	}
}
