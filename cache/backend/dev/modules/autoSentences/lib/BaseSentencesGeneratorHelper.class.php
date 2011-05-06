<?php

/**
 * sentences module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sentences
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSentencesGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'standard_sentence' : 'standard_sentence_'.$action;
  }
}
