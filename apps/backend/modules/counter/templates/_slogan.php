<a href="<?php echo url_for('counter/edit?id='.$counter->getId()) ?>"><?php
	if (!is_null($counter->getSlogan()->getName()))
		echo $counter->getSlogan()->getName();
	else echo "---";
?></a>
