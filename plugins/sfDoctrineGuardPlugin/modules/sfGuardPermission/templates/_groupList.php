<?php
/*author: Laurent*/
foreach($sf_guard_permission->getGroups() as $group)
{
    echo $group->getName();
    echo "<br>";
}
?>
