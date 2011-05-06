<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardPermission/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edition de "%%name%%"', array('%%name%%' => $sf_guard_permission->getName()), 'messages') ?></h1>

  <?php include_partial('sfGuardPermission/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sfGuardPermission/form_header', array('sf_guard_permission' => $sf_guard_permission, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('sfGuardPermission/form', array('sf_guard_permission' => $sf_guard_permission, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sfGuardPermission/form_footer', array('sf_guard_permission' => $sf_guard_permission, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
