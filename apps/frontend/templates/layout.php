<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php 
        echo __('Graine de vie');
        if(get_slot('title')):
            echo ' - '.get_slot('title');
        endif;
        ?></title>
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>

        <!-- Tracking de Google Analytics -->
        <?php include_once('googleanalyticstracking.php') ?>
        <!-- Fin du tracking de Google Analytics -->
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

            <div id="bg-frame-background"><img src="/images/bg-frame-global.png" alt="Madagascar" /></div>

            <div id ="upper-bar">
                <div>
                    <ul>
                        <li><a id="login-bar-button" href="<?php echo url_for('@sf_guard_auth_signin') ?>"><?php echo __("Se connecter") ?></a></li>
                        <li><span>|</span></li>
                        <li><a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __("S'inscrire") ?></a></li>
                    </ul>
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
            
            <?php if(config::getInstance()->get('counter'))
                include_component('counter', 'counter'); ?>

            <div id="center">
                <?php include_component('menu', 'menu') ?>

                <div id="content">
                    <?php echo $sf_content ?>



<?php
function url_actuelle()
{
     return "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}
$titre_page=get_slot('title');
?>
    <a href="#" title="<?php echo __('Partager sur Facebook') ?>" onclick="new_page('http://www.facebook.com/share.php?u=<?php echo urlencode(url_actuelle()) ?>',995,600,400)"><img src="/images/f_logo.png"/></a>
    <a href="#" title="<?php echo __('Partager sur Twitter') ?>" onclick="new_page('http://twitter.com/intent/tweet?text=<?php echo urlencode($titre_page) ?>&url=<?php echo url_actuelle() ?>',995,600,400)"><img src="http://twitter-badges.s3.amazonaws.com/t_logo-a.png" style="width:36px; height:36px"/></a>
    <a href="#" ><img src="/images/e-mail.png"/></a>
    <a href="#" ><img src="/images/signaler.png"/></a>

<div>
    <span style="vertical-align: 30%">
        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
        <a class="facebook-share-button" name="fb_share" type="button" href="http://www.facebook.com/sharer.php"><?php echo __('Partager'); ?></a>
    </span>

    <a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-lang="fr">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

    <span style="vertical-align: 35%">
        <script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>
        <a title="<?php echo __('Publier sur Google Buzz'); ?>" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="small-button" data-locale="fr"></a>
    </span>

    <a href="#" title="<?php echo __('Envoyer par mail') ?>"><img src="/images/e-mail2.png"/></a>
    <a href="#" title="<?php echo __('Signaler') ?>"><img src="/images/signaler2.png"/></a>
</div>

<!-- AddThis Button BEGIN -->
<script type="text/javascript">
        var addthis_config = {
                data_track_clickback: "true",
                ui_open_windows: "true",
                ui_delay: "750",
                ui_offset_top: "0",
                ui_header_color: "#8fbc13",
                ui_header_background: "#fbfbfb"
        }

        var addthis_config = {
            services_custom: {
                name: "<?php echo __('Signaler') ?>",
                url: "http://grainedevie.seaflat.be/?url={{url}}&title={{title}}&description={{description}}",
                icon: "/images/signaler3.png"
            }
        }
</script>

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d92ffa329add9af"></script>

<div class="addthis_toolbox addthis_default_style" addthis:url="http://www.example.com" addthis:title="An Example Title" addthis:description="An Example Description">
        <a class="addthis_button_facebook" title="<?php echo __('Partager sur Facebook') ?>"></a>
        <a class="addthis_button_twitter" title="<?php echo __('Partager sur Twitter') ?>"></a>
        <a class="addthis_button_grainedevie.seaflat.be" title="<?php echo __('Signaler') ?>"></a>
        <span class="addthis_separator">|</span>
        <a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d92ffa329add9af" class="addthis_button_compact"> <?php echo __('Partager') ?></a>
</div>

<div class="addthis_toolbox addthis_default_style" addthis:url="http://www.perdu.com" addthis:title="Site perdu" addthis:description="Lost Description">
        <a class="addthis_button_preferred_1"></a>
        <a class="addthis_button_preferred_2"></a>
        <a class="addthis_button_www.signaler.com" title="<?php echo __('Signaler') ?>"></a>
        <span class="addthis_separator">|</span>
        <a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d92ffa329add9af" class="addthis_button_compact"> <?php echo __('Partager') ?></a>
</div>
<!-- AddThis Button END -->



                </div>
            </div>

            <div id="footer">
            	<div id="logos">
                	<img src="/images/grainedevie.png" width="106" height="39" />
                	<img src="/images/frblogo.png" width="106" height="39" />
                </div>
                <div id="bottom-bar">
                	<ul>
                        <li class="form">
                            <?php include_component('language', 'language') ?>
                        </li>
                    	<li><a href="#"><?php echo __("Contact") ?></a></li>
                        <li>|</li>
                        <li><a href="#"><?php echo __("Mentions légales") ?></a></li>
                        <li>|</li>
                        <li><a href="#"><?php echo __("Plan du site") ?></a></li>
                    </ul>
                </div>
                <div id="legal"><?php echo __("Projet agréé par la Fondation Roi Baudouin | Copyright &copy; 2009 - 2011 Graine de vie. All rights reserved.") ?></div>
            </div>

        </div>
    </body>
</html>

