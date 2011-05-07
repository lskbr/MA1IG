<!--
    Réaliser par Laurent
-->
<?php
$page_title = __('Message envoyé');

slot('title', $page_title);
?>

<h1><?php echo $page_title ?></h1>
<tbody>
<p class="confirmation-text">
    <?php echo __('Votre message a été envoyé avec succès !')?>
</p>
<br />
<br />
<p>
    <a href="<?php echo url_for('@homepage')?>"><?php echo __('Retour à la page d\'acceuil')?></a>
</p>
</tbody>
