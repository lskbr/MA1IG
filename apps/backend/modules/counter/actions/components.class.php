<?php

class counterComponents extends sfComponents
{
	public function executeCounterText(sfWebRequest $request)
	{
		 $this->folders = Doctrine::getTable('CounterText')->findAll();
	}
}
?>
