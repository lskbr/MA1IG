<?php

require_once dirname(__FILE__).'/../lib/sloganGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sloganGeneratorHelper.class.php';

/**
 * slogan actions.
 *
 * @package    grainedevie
 * @subpackage slogan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sloganActions extends autoSloganActions
{
	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($slogan = Doctrine_Core::getTable('Slogan')->
			find(array($request->getParameter('id'))),
			sprintf('Object slogan does not exist (%s).', $request->getParameter('id')));
		
		$this->form = new SloganForm($slogan);
		
		$name = $request->getParameter($this->form->getName());
		SloganTable::updateSloganNames($request->getParameter('id'), $name['name']);
		
		$this->processForm($request, $this->form);
		$this->setTemplate('edit');
	}
}
