<?php

class counterComponents extends sfComponents
{
  public function executeCounter(sfWebRequest $request)
  {
  	 $this->counter = Doctrine_Core::getTable('Counter')->getCounterData();
  	 $this->counter_text = Doctrine_Core::getTable('CounterText')->getCounterText($this->getUser()->getCulture());
  }
}
?>