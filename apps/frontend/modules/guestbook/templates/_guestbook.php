<h1> <?php echo __('Livre d\'or'); ?></h1>
<p><?php echo __('Voici un message posté par un de nos visiteurs :'); ?></p>
<blockquote class="guestbook"><?php echo $guestbook[0]->getContent() ?></blockquote>
<div>
	<a href="<?php echo url_for('guestbook/index'); ?>"><?php echo __('Voir les autres messages...') ?></a>
</div>