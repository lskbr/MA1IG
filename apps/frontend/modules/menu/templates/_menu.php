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
	
	<!-- Page Facebook -->
	<div style="border: 1px #aaaaaa solid;
				border-top: 1px #315c99 solid;
				background-color: #ffffff;
				margin: 20px auto 20px auto;
				padding: 0;
				width: 214px;">
		<div style="border-bottom: 1px #c6cedd solid;
					background-color: #edeff4;
					padding: 5px;
					font-weight: bold;
					font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
					">
			<?php echo __('Retrouvez-nous sur Facebook') ?>
		</div>
		<iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FGraine-de-Vie%2F121700314571131&amp;width=194&amp;colorscheme=light&amp;show_faces=false&amp;stream=false&amp;header=true&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:194px; height:62px;" allowTransparency="true"></iframe>
	</div>
	<!-- Fin Page Facebook -->
</div>