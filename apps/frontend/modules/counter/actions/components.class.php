<?php

class counterComponents extends sfComponents
{
	public function executeCounter(sfWebRequest $request)
	{
		$this->counter = CounterTable::getCounterData();
		
		$this->counter_text = array(
			0 => CounterTable::getCounterText($this->getUser()->getCulture(), "position 1"),
			1 => CounterTable::getCounterText($this->getUser()->getCulture(), "position 2"),
			2 => CounterTable::getCounterText($this->getUser()->getCulture(), "position 3"));
	}
}
?>
