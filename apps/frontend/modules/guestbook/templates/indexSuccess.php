<h1><?php __('Livre d\'or :') ?></h1>
<p><?php echo __('Retrouvez ici les messages que les visiteurs du site ont postés à propos de l\'association graine de vie :'); ?>
<br/>

<?php 
	foreach($guestbook as $i => $m)
	{
		echo "<blockquote>";
		echo $m->getContent()."<br/>";
		echo "</blockquote>";
	}
?>
<p><?php echo __('Ajouter un message dans le livre d\'or :') ?>
<form id="comment_form" action="<?php echo url_for('guestbook/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php echo $form ?>
<br/><input type="submit" value="Envoyer" />
</form>