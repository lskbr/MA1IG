<input type="submit" value="Répondre" /> &nbsp;
&nbsp;<a href="#">Supprimer</a>&nbsp;
&nbsp;<a href="#">Enregistrer et répondre plus tard</a>&nbsp;
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