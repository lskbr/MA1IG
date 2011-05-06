<h1><?php echo __('Newsletter'); ?></h1><br/>
<?php 
echo __('Vous souhaitez être tenus informés de tout ce qui se passe sur le site ?');
echo '<br/>';
echo __('Abonnez vous à notre newsletter !');
echo '<br/>';
$form->getWidgetSchema()->setLabels(array(
     'email' => __('A quelle adresse e-mail souhaitez vous recevoir notre newsletter ?<br/>')
));
$form->setValidator('email', new sfValidatorEmail(array('required'=>true),array('invalid' => __('L\'adresse email est invalide'))));
?>
<form id="comment_form" action="<?php echo url_for('subscribe') ?>" method="post">
		<?php echo $form ?>
		<br/><input type="submit" value="M'inscrire !" />
</form>
<?php
echo ('<br/>');
echo __('Si vous souhaitez vous désinscrire de notre Newsletter, veuillez cliquer sur le lien en bas des newsletters que vous recevez.'); ?>
