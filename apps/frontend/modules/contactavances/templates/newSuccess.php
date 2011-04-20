<!--
    Réalisé par Laurent
-->
<h1><?php echo __('Nouveau message') ?></h1>

<?php
if(isset($mail) && isset($userName)){
    include_partial('form', array('form' => $form, 'mail' => $mail, 'userName' => $userName));
}else{
    include_partial('form', array('form' => $form));
}

?>
