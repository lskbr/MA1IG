<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contactavances/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Contactavances', array(), 'messages') ?></h1>

  <?php include_partial('contactavances/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('contactavances/form_header', array('message' => $message, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('contactavances/form', array('message' => $message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('contactavances/form_footer', array('message' => $message, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
