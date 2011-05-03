&nbsp;<a href="<?php echo url_for('folder/index');?>">Gérer les dossiers</a>&nbsp;
&nbsp;<a href="#">Options de la messagerie</a>&nbsp;


<div id="changeFolder">
    <?php include_component('folder', 'folder')?>
</div>

<div id="forwardResponse">
    <?php include_component('sfGuardUser', 'administrator')?>
</div>