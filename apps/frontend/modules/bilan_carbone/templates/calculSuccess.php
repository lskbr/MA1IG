<?php
use_helper('Number');

$page_title = __('Résultat du calcul de votre empreinte écologique');

slot('title', $page_title);
?>

<h1><?php echo $page_title ?></h1>
<div id="bilan_calcul">
    <div id="bilan_result">
        <?php echo __('Votre empreinte écologique s\'élève à :').'<br/><span class="bilan_nbr">'.format_number(round($sf_user->getAttribute('eco_footprint'), 2)).'</span> '.__('kg équiv. CO<sub>2</sub> par an'); ?>
    </div>
    <div class="bilan_don">
        <?php echo __('Pour compenser celle-ci totalement, il faudrait planter :').'<br/><span class="bilan_nbr">'.format_number(ceil($sf_user->getAttribute('nbr_trees'))).'</span> '.__('arbres'); ?>
    </div>
    <div class="bilan_don">
        <?php echo __('Aidez-nous à la compenser grâce à un don (%number%&nbsp;€/arbres) :', array('%number%' => $cost_tree)) ?><br/>
        <?php include_component('donenligne', 'show', array('montant' => round($sf_user->getAttribute('montant_don'), 2))); ?>
    </div>
</div>