<?php

/**
 * bilan_carbone actions.
 *
 * @package    grainedevie
 * @subpackage bilan_carbone
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bilan_carboneActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new BilanCarboneForm();
  }
}
