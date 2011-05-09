<?php

class google_analyticsComponents extends sfComponents
{
  public function executeGoogle_analytics(sfWebRequest $request)
  {
    $this->code = Doctrine_Core::getTable('GoogleAnalytics')->find(array('id'=>'1'));
  }
}
?>