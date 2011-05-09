<!--
    Réalisé par Laurent
-->
<?php
$page_title = __('Contactez-nous');

slot('title', $page_title);
?>

<h1><?php echo $page_title ?></h1>

<?php
if(isset($mail) && isset($userName)){
    include_partial('form', array('form' => $form, 'mail' => $mail, 'userName' => $userName));
}else{
    include_partial('form', array('form' => $form));
}

?>
