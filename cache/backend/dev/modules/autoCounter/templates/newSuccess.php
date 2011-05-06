<?php use_helper('I18N', 'Date') ?>
<?php include_partial('counter/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Gestion du compteur d\'arbres', array(), 'messages') ?></h1>

  <?php include_partial('counter/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('counter/form_header', array('counter' => $counter, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('counter/form', array('counter' => $counter, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('counter/form_footer', array('counter' => $counter, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
