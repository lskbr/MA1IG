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
      <div class="head_memberinfo">
        <div class="head_memberinfo_logo">
          <span>0</span>
          <img src="/images/unreadmail.png" alt=""/>
        </div>

        <span class='memberinfo_span'>Bienvenue <a href="">Admin</a></span>

        <span class='memberinfo_span'><a href="">Profil</a></span>
        <span><a href="login.html">Déconnexion</a></span>

        <span class='memberinfo_span2'><a href="">Aucun message en attente</a></span>
      </div>
    </div>
    <div class="body">
      <div id="sidebar">
        <ul>
          <?php use_helper('AdminMenu'); //Ajouter ici pour le menu
          echo menu_item('Accueil', 'homepage', $sf_context); // 'NomAAfficher','route',$sf_context;
          echo menu_item('Langage', 'language', $sf_context);
          echo menu_item('Configuration', 'configuration', $sf_context);
          echo menu_item('Catégories', 'category', $sf_context);?>
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
