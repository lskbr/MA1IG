<?php
$page_title = __('Don en ligne');

slot('title', $page_title);
?>

<h1><?php echo $page_title ?></h1>

<div id="text_donenligne">
    <h3><?php echo __('Aidez-nous à reboiser. Faites un don :') ?></h3>
</div>

<?php include_component('donenligne', 'show', array('montant'=>'8'))?>
