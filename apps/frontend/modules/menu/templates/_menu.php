<!--author: Laurent && Nicolas-->
<div id="sidebar">
    <ul id="menu">
        <li class="root">
            <div>
                <a class="accueil" href="<?php echo url_for('@homepage') ?>"><?php echo __('Accueil') ?></a>
            </div>
        </li>
        <?php foreach ($categories as $category): ?>
            <li class="root">
                <div class="backcolor categorie"><?php echo $category->getName() ?></div>
                <?php 
                $cat_active=false;
                foreach($pages[$category->getId()] as $p)
                {
                    if(strstr($p->getUrl(),$_SERVER["PATH_INFO"]) && strlen($_SERVER["PATH_INFO"])>5)
                        $cat_active=true;
                }

                if($cat_active) echo '<ul class="selected">';
                else echo '<ul>';

                foreach($pages[$category->getId()] as $p)
                {
                    echo '<li><a class="backcolor" href="'.$p->getUrl().'"><img src="/images/hierarchie.png" alt="Flèche" style="vertical-align:5%"/> '.$p->getMenuTitle().'</a></li>';
                }?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Préchargement des images JS -->
    <img src="/images/left.png" style="display: none"/>
    <img src="/images/down.png" style="display: none"/>
</div>