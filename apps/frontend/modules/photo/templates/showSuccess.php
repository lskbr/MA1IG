<?php
if($photo->getTitle()!=null):
?>
<h1>
<?php echo __('Titre').':'.$photo->getTitle() ?>
</h1>
<br/>
<?php endif; ?>

<?php
if($photo->getDescription()!=null):
?>
<h2>
<?php echo __('Description').':'.$photo->getDescription() ?>
</h2>
<?php endif; ?>

<?php include_partial('photo/picsingle', array('photo' => $photo)) ?>

<hr />

<a href="<?php echo url_for('photo/index') ?>">List</a>
