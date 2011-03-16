<?php

/**
 * page actions.
 *
 * @package    grainedevie
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if (!$request->getParameter('sf_culture'))
    {
	  $culture = $request->getPreferredCulture(array('en', 'fr'));
	  $this->getUser()->setCulture($culture);
      $this->redirect('localized_homepage');
    }
  }
  public function executeShow(sfWebRequest $request)
  {

  	$id=$request->getParameter('id');
  	$q = Doctrine_Query::create()->from('StaticPage p')->where('is_activated=1')->andWhere('id='.$id);
  	$page=$q->execute();
  	var_dump(sizeof($page));
  	exit();
  }
}
