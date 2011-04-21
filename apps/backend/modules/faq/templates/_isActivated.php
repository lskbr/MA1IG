<?php
    if($faq->getIsActivated())
    {
        $visibility = "Visible";
        $link_title = "Rendre invisible";
    }
    else
    {
        $visibility = "Non visible";
        $link_title = "Rendre visible";
    }

    echo link_to($visibility, 'faq/activateToggle?id='.$faq->getId(), 'title='.$link_title);
?>