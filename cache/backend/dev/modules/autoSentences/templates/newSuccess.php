<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sentences/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nouvelle phrase type', array(), 'messages') ?></h1>

  <?php include_partial('sentences/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sentences/form_header', array('standard_sentence' => $standard_sentence, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('sentences/form', array('standard_sentence' => $standard_sentence, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sentences/form_footer', array('standard_sentence' => $standard_sentence, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
