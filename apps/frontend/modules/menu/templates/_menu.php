<!--author: Laurent && Nicolas-->
<div id="sidebar">
    <ul id="menu">
        <li class="root">
            <div>
                <a class="accueil" href="<?php echo url_for('localized_homepage') ?>"><?php echo __('Accueil') ?></a>
            </div>
        </li>
        <?php foreach ($categories as $category): ?>
            <li class="root">
                <?php 
                $cat_active=false;
                foreach($pages[$category->getId()] as $p)
                {
                    if(strstr($p->getUrl(),$_SERVER["PATH_INFO"]) && strlen($_SERVER["PATH_INFO"])>5)
                        $cat_active=true;
                }
                
                if($cat_active) {
                    $cat_active_text = 'class="selected"';
                    $cat_active_text2 = 'cat_selected';
                }
                else {
                    $cat_active_text = '';
                    $cat_active_text2 = '';
                }

                echo '<div class="backcolor categorie '.$cat_active_text2.'">'.$category->getName().'</div>';
                echo '<ul '.$cat_active_text.'>';

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
	
	<!-- Page Facebook -->
        <?php
        if(config::getInstance()->get('fb_page'))
            include_partial('fb_page/fb_page');
        ?>
</div>