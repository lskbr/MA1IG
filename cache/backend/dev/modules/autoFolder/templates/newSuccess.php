<?php use_helper('I18N', 'Date') ?>
<?php include_partial('folder/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Creer un nouveau dossier', array(), 'messages') ?></h1>

  <?php include_partial('folder/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('folder/form_header', array('folder' => $folder, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('folder/form', array('folder' => $folder, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('folder/form_footer', array('folder' => $folder, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
