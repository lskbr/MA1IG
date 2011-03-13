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
            <div id="bg-frame-top"></div>
            <div id="bg-frame-center"></div>
            <div id="bg-frame-bottom"></div>

            <div id ="upper-bar">
                <div>
                    <ul>
                        <li><a id="login-bar-button" href="#"><?php echo __("Se connecter") ?></a></li>
                        <li><span>|</span></li>
                        <li><a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __("S'inscrire") ?></a></li>
                    </ul>
                </div>
            </div>

            <div id="header">
                <div id="pSlider" class="protoSlider">
                    <a href="#">
                        <img src="/images/forest1.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest2.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest3.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest4.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest5.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest6.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest7.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest8.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                    <a href="#">
                        <img src="/images/forest9.jpg" alt="Image title 1" />
                        <span>Image title 1</span>
                    </a>
                </div>

                <div id="login">
                    <a id="x-button" href="#"></a>
                    <?php include_component('sfGuardAuth', 'signin_form') ?>
                </div>

                <div id="header-logo"><a href="<?php echo url_for('@homepage') ?>"><img src="/images/header-logo.png" /></a></div>
                <div id="counter-text"><?php echo __('Nous avons déjà planté') ?></div>
            </div>

            <div id="counter">
                <img src="/images/counter.jpg" />
            </div>

            <div id="test"></div>

            <div id="center">

                <?php include_component('menu', 'menu') ?>

                <div id="content">
                    <?php echo $sf_content ?>
                    <!-- <p class="left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit. Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula.</p>-->
                    <!-- <p class="right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit. Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula.</p>-->
                </div>
            </div>

            <div id="footer">
                <div>
                    <img src="/images/grainedevie.png" width="106" height="39" />
                    <img src="/images/frblogo.png" width="106" height="39" />
                </div>
            </div>

        </div>
    </body>
</html>

