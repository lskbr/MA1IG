<?php

require_once dirname(__FILE__).'/../lib/languageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/languageGeneratorHelper.class.php';

/**
 * language actions.
 *
 * @package    grainedevie
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class languageActions extends autoLanguageActions
{
	public function executeEnable(sfWebRequest $request)
	{
		$lang = $this->getRoute()->getObject();
		$lang->enable();
		$this->getUser()->setFlash('notice', 'Le '.strtolower($lang->getName()).' est désormais activé');
 		$this->redirect('language');
	}
	public function executeDisable(sfWebRequest $request)
	{
		$lang = $this->getRoute()->getObject();
		$lang->disable();
		$this->getUser()->setFlash('notice', 'Le '.strtolower($lang->getName()).' est désormais désactivé');
 		$this->redirect('language');
	}
}
