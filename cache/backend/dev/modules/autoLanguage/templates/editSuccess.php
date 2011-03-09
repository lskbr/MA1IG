<?php use_helper('I18N', 'Date') ?>
<?php include_partial('language/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Language', array(), 'messages') ?></h1>

  <?php include_partial('language/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('language/form_header', array('language' => $language, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('language/form', array('language' => $language, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('language/form_footer', array('language' => $language, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
