<input type="submit" value="Répondre" /> &nbsp;
&nbsp;<a href="#">Supprimer</a>&nbsp;
&nbsp;<a href="#">Enregistrer et répondre plus tard</a>&nbsp;
&nbsp;<a href="#">Déléguer la réponse</a>&nbsp;
&nbsp;<a href="#" class="insertFromFaq">Insérer une réponse de la faq</a>&nbsp;
&nbsp;<a href="#">Insérer une phrase déterminée</a>&nbsp;

<div id="insertFaqQuestion">
    <?php $categoryId = $message->getCategoryId(); ?>
    <?php include_component('faq', 'getQuestions', array('catid' => $categoryId)); ?>
</div>

