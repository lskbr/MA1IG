<h1><?php echo __('Livre d\'or') ?></h1>
<h3><?php echo __('Retrouvez ici les messages que les visiteurs du site ont postés à propos de Graine de vie :'); ?></h3>
<?php 
	foreach($guestbook as $i => $m)
	{
		echo "<blockquote>";
		echo $m->getContent()."<br/>";
		echo "</blockquote>";
	}
?>

<h2><?php echo __('Signer le livre d\'or :') ?></h2>
<form id="comment_form" action="<?php echo url_for('guestbook/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php echo $form ?>
<br/><input type="submit" value="Envoyer" />
</form>