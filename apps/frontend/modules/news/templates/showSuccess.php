<?php
slot('title', $news->getTitle());

if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
?>
<h1><?php echo $news->getTitle();?></h1>
<p class="date_ind">Posté le <?php echo date('d/m/Y',strtotime($news->getPublicationDate())); ?>.<p>
<div class="news_ind">
<p><?php echo $news->getContent(ESC_RAW); ?></p>
</div>
<p><?php echo link_to('Retour à la liste des news','news') ?><p>

<div class="news_comments">
	<?php 
	foreach($comments as $i=>$com)
	{
		if($com->getFatherId()==null)
			echo'<div class="comment_item"/>';
		else
			echo'<div class="comment_item answer"/>';
		?>
		<div class="comment_header"/>
		<?php echo $com->getsfGuardUser()->getName(); ?> - Le <?php echo date('d-m-Y à H:i:s',strtotime($com->getCreatedAt()));?>
		<div>
		<?php if($authenticated && $com->getFatherId()==null):?><a href="<?php echo url_for('news_answer', $news).$com->getId().'#comment_form';?>">Répondre</a><?php endif; ?>
		<?php if($authenticated && $sf_user->hasCredential('DeleteNewsComments')){
			if($com->getFatherId()!=null || $com->getId()!=$comments[$i+1]->getFatherId())
			echo link_to('<img alt="supprimer" src="/images/icons/delete_small.png"/>', 'newsComments/delete?id='.$com->getId(), array('method' => 'delete', 'confirm' => 'Etes vous sur de vouloir supprimer le commentaire de '.$com->getsfGuardUser()->getName().' ?'));
		}
		?>
		</div>
		</div>
		<div class="comment_content"/>
		<?php echo $com->getContent(); ?>
		</div>
		</div>
		<?php
	}
	?>

	<?php if($authenticated): ?>
	<form id="comment_form" action="<?php echo url_for('newsComments/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
		<?php echo $form ?>
		<br/><input type="submit" value="Envoyer" />
	</form>
	<?php
	else:
	?>
	<p><b>Veuillez vous connecter pour commenter les actualités</b></p>
	<?php
	endif;
	?>
</div>