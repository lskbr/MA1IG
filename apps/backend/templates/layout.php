<?php $sf_user->setCulture('fr_FR');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>

    </head>
    <body>

        <div id="head">
            <a href="<?php echo url_for('homepage') ?>">
                <img id="logo" src="/images/logo.png" alt="Retour à l'index" />
            </a>
            <?php if ($sf_user->isAuthenticated()): ?>
                <div class="head_memberinfo">
                    <div class="head_memberinfo_logo">
                        <span><?php
                if (Doctrine_Core::getTable('BooleanConfiguration')->createQuery()->where('main = "contacts"')->fetchOne()->getIsActivated()) {
                    $numberOfMessage = MessageTable::numberOfNewMessage($sf_user->getPerson()->getId());
                    echo $numberOfMessage;
                }
            ?></span>
                    <img src="<?php if(isset($numberOfMessage)) {echo "/images/unreadmail.png";}?>" alt=""/>
                </div>

                <span class='memberinfo_span'>Bienvenue <a href=""><?php echo $sf_user->getName() ?></a></span>

                <span><a href="login.html"><?php echo link_to('Déconnexion', 'sf_guard_logout') ?></a></span>
                <span class='memberinfo_span2'><a href="<?php echo url_for('contactavances/index'); ?>"><?php if (isset($numberOfMessage)) {
                            echo $numberOfMessage . " message(s) en attente";
                        } ?></a></span>
            </div>
<?php endif ?>
                    </div>

                    <div class="body">
                        <div id="sidebar">
                            <ul>
                    <?php
                        use_helper('AdminMenu'); //Ajouter ici pour le menu
                        if ($sf_user->isAuthenticated()) {
                            menu_item('Accueil', 'homepage', $sf_context); // 'NomAAfficher','route',$sf_context,à activer;
                            menu_item('Messagerie', 'contactavances', $sf_context, 'contacts');
                            menu_item('Donations', 'donenligne', $sf_context, 'donenligne');
                            menu_item('Actualités', 'news', $sf_context, 'news');
                            menu_item('Newsletter', 'newsletter', $sf_context);
                            menu_item('Langues', 'language', $sf_context);
                            menu_item('Configuration', 'configuration', $sf_context);
                            menu_item('Catégories', 'category', $sf_context);
                            menu_item('Pages', 'static_page', $sf_context);
                            menu_item('Utilisateurs', 'sf_guard_user', $sf_context);
                            menu_item('Groupes', 'sf_guard_group', $sf_context);
                            menu_item('Droits', 'sf_guard_permission', $sf_context);
                            menu_item('Citation', 'citation', $sf_context, 'citation');
                            menu_item('Compteur d\'arbres', 'counter', $sf_context);
                            menu_item('Partenaires', 'partner', $sf_context, 'partner');
                            menu_item('Catégories de FAQ', 'faq_category', $sf_context, 'faq');
                            menu_item('Livre d\'or', 'guestbook', $sf_context, 'guestbook');
                            menu_item('FAQ', 'faq', $sf_context, 'faq');
                            menu_item('Photos', 'photo', $sf_context);
                            menu_item('Galeries', 'galery', $sf_context);
                            menu_item('Pages dynamiques', 'dynamic_page', $sf_context);
                            menu_item('Multiple Photo Upload', 'multiplephoto', $sf_context);
                            menu_item('Empreinte écologique', 'bilan_carbone_coeff', $sf_context, 'bilan_carbone');
                        } else {
                            echo menu_item('Connexion', 'sf_guard_signin', $sf_context);
                        }
                    ?>
                    </ul>
                </div>
                <div class="main">
<?php echo $sf_content ?>
            </div>
            <div id="footer">
            </div>
        </div>
    </body>
</html>
