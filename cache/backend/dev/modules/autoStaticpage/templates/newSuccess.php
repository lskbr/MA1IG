<?php use_helper('I18N', 'Date') ?>
<?php include_partial('staticpage/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Ajout d\'une page', array(), 'messages') ?></h1>

  <?php include_partial('staticpage/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('staticpage/form_header', array('static_page' => $static_page, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('staticpage/form', array('static_page' => $static_page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('staticpage/form_footer', array('static_page' => $static_page, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
