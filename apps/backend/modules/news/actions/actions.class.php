<?php

require_once dirname(__FILE__).'/../lib/newsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/newsGeneratorHelper.class.php';

/**
 * news actions.
 *
 * @package    grainedevie
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends autoNewsActions
{
	public function executeEnable(sfWebRequest $request)
	{
		$news = $this->getRoute()->getObject();
		$news->enable();
		$this->getUser()->setFlash('notice', 'La news à été publiée et pourra apparaître sur le site.');
 		$this->redirect('news');
	}
	public function executeDisable(sfWebRequest $request)
	{
		$news = $this->getRoute()->getObject();
		$news->disable();
		$this->getUser()->setFlash('notice', 'La news à été invalidée et n\'apparaîtra plus sur le site.');
 		$this->redirect('news');
	}
}
