<?php use_helper('I18N', 'Date') ?>
<?php include_partial('counter/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Gestion du compteur d\'arbres', array(), 'messages') ?></h1>

  <?php include_partial('counter/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('counter/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('counter/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('counter/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('counter/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('counter/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
