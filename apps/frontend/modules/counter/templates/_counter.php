<div id="counter-box">
  <ul>
    <li id="icon-tree"></li>
    <li id="counter"></li>
    <li id="slogan1"><?php print($counter[0]->getSloganPart1()); ?></li>
  </ul>
  <form>
    <input type="hidden" id="counter-trees" value="<?php print($counter[0]->getPlantedTrees()); ?>" />
    <input type="hidden" id="counter-interval" value="<?php print($counter[0]->getInterval()); ?>"  />
  </form>
</div>