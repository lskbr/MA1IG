<h1><?php echo __('Actualités');?></h1>
<?php foreach($news as $new)
{
	?>
	<div class="news">
	<span class="date"><?php echo date('d-m-Y',strtotime($new->getPublicationDate())); ?> - </span>
	<a href="<?php echo url_for('news_show', $new);?>" class="title"><?php echo $new->getTitle(); ?></a><br/>
	<p class="news_content"><?php echo $new->getFormatedText(config::getInstance()->get('char_by_news')); ?> <a class="news_link" href="<?php echo url_for('news_show', $new);?>"><?php echo __('Lire la suite'); ?></a></p>
	<div class="news_clear"></div>
	</div>
	<?php
}
?>
<div>
	<a href="<?php echo url_for('news'); ?>">Cliquez ici pour voir les news plus anciennes.</a>
</div>