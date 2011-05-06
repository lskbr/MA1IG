<?php

/**
 * staticpage module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage staticpage
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStaticpageGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'static_page' : 'static_page_'.$action;
  }
}
