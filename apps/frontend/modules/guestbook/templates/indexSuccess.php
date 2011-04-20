<h2>Livre d'or :</h2>
<p><?php echo __('Retrouvez ici les messages que les visiteurs du site ont postés à propos de l\'association graine de vie :'); ?>
<br/>

<?php 
	foreach($guestbook as $i => $m)
	{
		echo "<div class='guestbook_col1'>";
		echo "<br/>".$m->getContent();
		echo "</div>";
	}
?>

<?php include_partial('form', array('form' => $form)) ?>