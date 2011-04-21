<!--author: Laurent && Nicolas-->
<div id="sidebar">
    <ul id="menu">
        <li><a class="head" href="<?php echo url_for('@homepage') ?>">
        <?php echo __('Accueil') ?></a></li>
        <?php foreach ($categories as $category): ?>
            <li>
                <span class="head"><?php echo $category->getName() ?></span>
                <?php 
                $active=false;
                foreach($pages[$category->getId()] as $p)
                {
                    if(strstr($p->getUrl(),$_SERVER["PATH_INFO"]) && strlen($_SERVER["PATH_INFO"])>5)
                        $active=true;
                }
                if($active) echo '<ul class="selected">';
                else echo '<ul>';
                    foreach($pages[$category->getId()] as $p)
                    {
                        echo '<li><a href="'.$p->getUrl().'"><img src="/images/hierarchie.png" style="vertical-align:0%"/> '.$p->getMenuTitle().'</a></li>';
                    }?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>