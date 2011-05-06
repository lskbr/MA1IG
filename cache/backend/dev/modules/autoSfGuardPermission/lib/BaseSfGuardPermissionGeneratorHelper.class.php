<?php

/**
 * sfGuardPermission module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sfGuardPermission
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardPermissionGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'sf_guard_permission' : 'sf_guard_permission_'.$action;
  }
}
