<div id="counter-box">
  <ul>
    <li id="icon-tree"></li>
    <li id="counter"></li>
    <li id="slogan1"><?php print($counter[0]->getSloganPart1()); ?></li>
  </ul>
  <div id="donation-box">
    <div id="slogan2"><?php print($counter[0]->getSloganPart2()); ?></div>
    <div id="donate"><?php print($counter[0]->getDonationText()); ?></div>
  </div>
  <form>
    <input type="hidden" id="counter-trees" value="<?php print($counter[0]->getPlantedTrees()); ?>" />
    <input type="hidden" id="counter-interval" value="<?php print($counter[0]->getInterval()); ?>"  />
    <input type="hidden" id="counter-delay" value="<?php
    	print(round(microtime(true)*1000) + $counter[0]->getDelay()); ?>"  />
  </form>
</div>