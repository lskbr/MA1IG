<input type="submit" value="Enregistrer et répondre plus tard" /> &nbsp;
&nbsp;<a href="#">Supprimer</a>&nbsp;
&nbsp;<a href="<?php echo url_for('contactavances/sendMail?id='.$message->getId()); ?>">Répondre</a>&nbsp;
&nbsp;<a href="#" class="sf_admin_action_forward_link" id="<?php echo $message->getId()?>">Déléguer la réponse</a>&nbsp;
&nbsp;<a href="#" class="insertFromFaq">Insérer une réponse de la faq</a>&nbsp;
&nbsp;<a href="#" class="insertStandartSentence">Insérer une phrase déterminée</a>&nbsp;

<div id="insertFaqQuestion">
    <?php $categoryId = $message->getCategoryId(); ?>
    <?php include_component('faq', 'getQuestions', array('catid' => $categoryId)); ?>
</div>

<div id="forwardResponse">
    <?php include_component('sfGuardUser', 'administrator')?>
</div>

<div id="insertSentence">
    <?php include_component('sentences', 'sentence')?>
</div>