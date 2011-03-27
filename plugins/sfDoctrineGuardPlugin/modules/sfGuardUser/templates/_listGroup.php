<?php
/* 
 * author: Laurent
 */

foreach($sf_guard_user->getGroups() as $group)
{
    echo $group->getName();
    echo "<br>";
}
?>
