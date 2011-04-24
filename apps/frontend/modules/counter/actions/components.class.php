<?php

class counterComponents extends sfComponents
{
  public function executeCounter(sfWebRequest $request)
  {
  	 $this->counter = Doctrine_Core::getTable('Counter')->getCurrentData($this->getUser()->getCulture());
  }
}
?>