<input type="submit" value="Répondre" name="_now"/> &nbsp;
&nbsp;<input type="submit" value="Enregistrer et répondre plus tard" name="_save_and_later"/> &nbsp;
&nbsp;<a href="#" class="insertFromFaq">Insérer une réponse de la faq</a>&nbsp;
&nbsp;<a href="#" class="insertStandartSentence">Insérer une phrase déterminée</a>&nbsp;
&nbsp;<?php echo $helper->linkToDelete($message, array('params' => array(), 'confirm' => 'Etes-vous sûr?', 'class_suffix' => 'delete', 'label' => 'Supprimer',)); ?>&nbsp;


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