<?php $page_title = __('Résultat du calcul de votre empreinte écologique'); ?>

<?php slot('title', $page_title); ?>

<h1><?php echo $page_title ?></h1>

<?php
if ($sf_user->getAttribute('eco_footprint') == '' || $sf_user->getAttribute('nbr_trees') == ''):
?>
<div id="bilan_result"><?php echo link_to(__('Vous n\'avez pas encore calculé votre empreinte écologique'), '@bilan_carbone', array('title' => __('Cliquez ici pour la calculer'))); ?></div>
<?php
else:
?>
<div id="bilan_result"><?php echo __('Votre empreinte écologique s\'élève à').' <span class="bilan_nbr">'.$sf_user->getAttribute('eco_footprint').'</span> kg équiv. CO<sub>2</sub>'; ?></div>
<div class="bilan_don"><?php echo __('Pour compenser celle-ci totalement, il faudrait planter %nbr_trees% arbres', array('%nbr_trees%' => '<span class="bilan_nbr">'.$sf_user->getAttribute('nbr_trees').'</span>')); ?></div>
<div class="bilan_don"><?php echo __('Aidez-nous à la compenser (au moins en partie) grâce à un don !') ?></div>
<?php
endif;
?>