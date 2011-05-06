<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardGroup/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Liste des différents groupes', array(), 'messages') ?></h1>

  <?php include_partial('sfGuardGroup/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sfGuardGroup/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <form action="<?php echo url_for('sf_guard_group_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sfGuardGroup/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sfGuardGroup/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('sfGuardGroup/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sfGuardGroup/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
