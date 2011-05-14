<?php
    if($galery->getIsActivated())
    {
        $visibility = "Visible";
        $link_title = "Rendre invisible";
    }
    else
    {
        $visibility = "Non visible";
        $link_title = "Rendre visible";
    }
    echo link_to($visibility, 'galery/activateToggle?id='.$galery->getId(), 'title='.$link_title);
?>
