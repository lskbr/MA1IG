<!--author: Laurent-->
<div id="sidebar">
    <ul id="menu">
        <li><a href="<?php echo url_for('@homepage') ?>">Accueil</a></li>
        <?php foreach ($categories as $category): ?>
            <li>
                <span><?php echo $category->getName() ?><span>&#x21E9;</span></span>
                <ul>
                    <?php foreach($pages[$category->getId()] as $p)
                    {
                        echo '<li><a href="'.$p->getUrl().'">'.$p->getMenuTitle().'</a></li>';
                    }?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
