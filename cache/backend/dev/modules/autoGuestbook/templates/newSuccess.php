<?php use_helper('I18N', 'Date') ?>
<?php include_partial('guestbook/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Guestbook', array(), 'messages') ?></h1>

  <?php include_partial('guestbook/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('guestbook/form_header', array('guestbook' => $guestbook, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('guestbook/form', array('guestbook' => $guestbook, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('guestbook/form_footer', array('guestbook' => $guestbook, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
