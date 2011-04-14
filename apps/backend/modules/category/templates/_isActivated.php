<?php
    if($category->getIsActivated())
    {
        $visibility = "Visible";
        $link_title = "Rendre invisible";
    }
    else
    {
        $visibility = "Non visible";
        $link_title = "Rendre visible";
    }

    echo link_to($visibility, 'category/activateToggle?id='.$category->getId(), 'title='.$link_title);
?>
