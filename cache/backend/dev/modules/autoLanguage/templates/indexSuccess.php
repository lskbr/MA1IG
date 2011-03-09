<?php use_helper('I18N', 'Date') ?>
<?php include_partial('language/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Liste des langues présentes sur le site :', array(), 'messages') ?></h1>

  <?php include_partial('language/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('language/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('language/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('language/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('language/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('language/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
