<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo __('Graine de Vie') ?></title>
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>
    </head>

    <body>
        <div id="global">
            <div id="overPSlider">
            <div id="pSlider" class="protoSlider">
                <a href="#">
                    <img src="/images/forest1.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest2.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest3.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest4.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest5.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest6.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest7.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest8.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
                <a href="#">
                    <img src="/images/forest9.jpg" alt="Madagascar" />
                    <span>Image title 1</span>
                </a>
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
                </div>

                <div id="header-logo"><a href="<?php echo url_for('@homepage') ?>"><img src="/images/header-logo.png" /></a></div>
                <div id="counter-text"><?php echo __('Nous avons déjà planté') ?></div>
            </div>

            <div id="counter">
                <img src="/images/counter.png" />
            </div>

            <div id="center">
                <?php include_component('menu', 'menu') ?>

                <div id="content">
                    <?php echo $sf_content ?>
                </div>
            </div>

            <div id="footer">
            	<div id="logos">
                	<img src="/images/grainedevie.png" width="106" height="39" />
                	<img src="/images/frblogo.png" width="106" height="39" />
                </div>
                <div id="bottom-bar">
                	<ul>
                    	<li><a href="#">Contact</a></li>
                        <li>|</li>
                        <li><a href="#">Mentions légales</a></li>
                        <li>|</li>
                        <li><a href="#">Plan du site</a></li>
                    </ul>
                </div>
                <div id="legal">Projet agréé par la Fondation Roi Baudouin | Copyright &copy; 2009 - 2011 Graine de vie. All rights reserved.</div>
            </div>

        </div>
    </body>
</html>

