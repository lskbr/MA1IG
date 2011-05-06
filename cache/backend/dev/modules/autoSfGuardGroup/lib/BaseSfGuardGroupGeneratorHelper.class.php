<?php

/**
 * sfGuardGroup module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sfGuardGroup
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardGroupGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'sf_guard_group' : 'sf_guard_group_'.$action;
  }
}
