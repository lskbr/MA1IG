<h1> <?php echo __('Livre d\'or'); ?></h1>
<p>Voici un message posté par un de nos visiteurs :</p>
<blockquote class="guestbook"><?php echo $guestbook[0]->getContent() ?></blockquote>