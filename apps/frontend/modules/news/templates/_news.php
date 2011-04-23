<h1><?php echo __('Actualités');?></h1>
<?php foreach($news as $new)
{
	?>
	<div class="news">
	<?php echo $new->getTitle(); ?>
	<span class="date"><?php echo date('d-m-Y',strtotime($new->getPublicationDate())); ?></span><br/>
	<?php echo $new->getFormatedText(200); ?> <a class="news_link" href="<?php echo url_for('news_show', $new);?>"><?php echo __('Lire la suite') ?></a>
	</div>
	<br/>
	<?php
}
?>

<a href="<?php echo url_for('news'); ?>">Voir les news plus anciennes.</a>