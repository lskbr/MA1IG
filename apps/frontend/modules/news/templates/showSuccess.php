<?php
slot('title', $news->getTitle());

if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
?>
<h1><?php echo $news->getTitle();?></h1>
<p class="date_ind">Posté le <?php echo date('d/m/Y',strtotime($news->getPublicationDate())); ?>.<p>
<div class="news_ind">
<p><?php echo $news->getContent(ESC_RAW); ?></p>
<?php include_partial('social_sharing/social_sharing', array(
        'url_news' => url_for('news_show', $news),
        'url_title' => $news->getTitle(),
        'url_description' => $news->getFormatedText(config::getInstance()->get('char_by_news_list'))
    ))
?>
</div>
<p><?php echo link_to('Retour à la liste des news','news') ?><p>