<a href="<?php echo url_for('counter/edit?id='.$counter->getId()) ?>"><?php
	echo date('\L\e d-m-Y',strtotime($counter->getInitialDate()));
?></a>
