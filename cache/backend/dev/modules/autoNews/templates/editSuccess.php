<?php use_helper('I18N', 'Date') ?>
<?php include_partial('news/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit News', array(), 'messages') ?></h1>

  <?php include_partial('news/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('news/form_header', array('news' => $news, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('news/form', array('news' => $news, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('news/form_footer', array('news' => $news, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
