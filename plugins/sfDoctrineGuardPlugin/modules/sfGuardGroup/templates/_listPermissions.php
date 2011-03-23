<?php
/*
 * author: Laurent
 */

foreach ($sf_guard_group->getPermissions() as $permission) {
    echo $permission->getName();
    echo "<br>";
}

?>
