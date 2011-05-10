<?php

class counterComponents extends sfComponents
{
	public function executeCounter(sfWebRequest $request)
	{
		$this->counter = CounterTable::getCounterData();
		
		$this->counter_text = array(
			0 => CounterTable::getCounterText($this->getUser()->getCulture(), "text1"),
			1 => CounterTable::getCounterText($this->getUser()->getCulture(), "text2"),
			2 => CounterTable::getCounterText($this->getUser()->getCulture(), "text3"));
	}
}
?>
