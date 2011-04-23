<h1><?php echo __('Actualités');?></h1>
<?php foreach($news as $new)
{
	?>
	<div class="news">
	<?php echo $new->getTitle(); ?>
	<span class="date"><?php echo date('d-m-Y',strtotime($new->getPublicationDate())); ?></span><br/>
	<?php echo $new->getFormatedText(200); ?>
	</div>
	<br/>
	<?php
}
?>