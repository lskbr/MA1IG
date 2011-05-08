<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php 
        if(get_slot('title')):
            echo get_slot('title').' - ';
        endif;
        echo __('Graine de vie');
        ?></title>
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>

        <?php
        // Tracking de Google Analytics
        if(config::getInstance()->get('google_analytics'))
            include_component('google_analytics', 'google_analytics');
        ?>
    </head>

    <body>
        <div id="global">
            <div id="overPSlider">
            <div id="pSlider" class="protoSlider">
            <?php
            $back_img = array();

            $rep = './images/background/';
            $d = opendir($rep);

            while($entry = readdir($d)) {
                if(is_file($rep.$entry)) {
                    array_push($back_img, $entry);
                }
            }
            closedir($d);

            shuffle($back_img);
			$back_img = array_slice($back_img, 0, 4);

            foreach ($back_img as $value):
            ?>
                <a href="#">
                    <img src="<?php echo substr($rep,1).$value ?>" alt="Madagascar" />
                </a>
            <?php
            endforeach;
            ?>
            </div>
            </div>

            <div id="bg-frame-background"></div>

            <div id ="upper-bar">
                <div>
                    <?php if(config::getInstance()->get('search')) { ?>
                    <ul id="search">
                      <li><span>|</span></li>
                      <li><a href="#" id="search_text" title="<?php echo __('Basculer vers la recherche') ?>"><?php echo __("Rechercher") ?></a></li>
                    </ul>
                    <?php } ?>
                    <?php include_component('login', 'login') ?>
                </div>
            </div>

            <div id="header">
                <div id="login">
                    <a id="x-button" href="#"></a>
                    <?php include_component('sfGuardAuth', 'signin_form') ?>

                    <img src="/images/x-button.png" style="display: none;"/>
                    <img src="/images/x-button-hover.png" style="display: none;"/>
                </div>

                <div id="header-logo">
                    <a href="<?php echo url_for('@homepage') ?>" id="logo_link">
                        <img src="/images/header-logo.png" /><br/>
                        <span id="slogan_link"><?php echo __('Compensons notre empreinte écologique !'); ?></span>
                    </a>
                </div>
            </div>
            
            <?php
            if(config::getInstance()->get('counter'))
                include_component('counter', 'counter');
            ?>

            <div id="center">
                <?php include_component('menu', 'menu') ?>

                <div id="content">
                    <?php
                    echo '<div class="social_sharing">'.$sf_content.'</div>';

                    // Partage sur les réseaux sociaux
                    if(config::getInstance()->get('social_sharing'))
                        include_partial('social_sharing/social_sharing');
                    ?>
                </div>
            </div>

            <div id="footer">
            	<div id="logos">
                	<img src="/images/grainedevie.png" width="106" height="39" />
                	<img src="/images/frblogo.png" width="106" height="39" />
                </div>
                <div id="bottom-bar">
                    <ul>
                        <li class="form"><?php include_component('donenligne', 'show')?></li>
                        
                        <li class="sep_li">|</li>
                        <li class="form"><?php include_component('language', 'language') ?></li>

                        <?php if(config::getInstance()->get('page_contact')): ?>
                        <li class="sep_li">|</li>
                        <li><a href="<?php echo url_for(config::getInstance()->get('id_contact'));  ?>"><?php echo __("Contact") ?></a></li>
                        <?php endif;

                        if(config::getInstance()->get('page_mention')): ?>
                        <li>|</li>
                        <li><a href="<?php echo url_for(config::getInstance()->get('id_mention'));  ?>"><?php echo __("Mentions légales") ?></a></li>
                        <?php endif;

                        if(config::getInstance()->get('page_sitemap')): ?>
                        <li>|</li>
                        <li><a href="<?php echo url_for(config::getInstance()->get('id_sitemap'));  ?>"><?php echo __("Plan du site") ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div id="legal"><?php echo __("Projet agréé par la Fondation Roi Baudouin | Copyright &copy; 2009 - 2011 Graine de vie. All rights reserved.") ?></div>
            </div>

        </div>
    </body>
</html>
