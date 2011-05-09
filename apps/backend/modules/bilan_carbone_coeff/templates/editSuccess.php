<?php use_helper('I18N', 'Date') ?>
<?php include_partial('bilan_carbone_coeff/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Modification d\'un coefficient du calcul de l\'Empreinte écologique :', array(), 'messages') ?></h1>

  <?php include_partial('bilan_carbone_coeff/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('bilan_carbone_coeff/form_header', array('bilan_carbone_coeff' => $bilan_carbone_coeff, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('bilan_carbone_coeff/form', array('bilan_carbone_coeff' => $bilan_carbone_coeff, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('bilan_carbone_coeff/form_footer', array('bilan_carbone_coeff' => $bilan_carbone_coeff, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
