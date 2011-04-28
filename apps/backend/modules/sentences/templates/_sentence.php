<center><h1>Phrases enregistrées</h1></center>
<li>
<?php foreach ($standardSentences as $standardSentence): ?>
    <ul><a href="#" class="linkStandardSentences" content="<?php echo $standardSentence->getText(); ?>"><?php echo $standardSentence->getTitle(); ?></a></ul>
<?php endforeach; ?>
</li>
<a href="<?php echo url_for1('sentences')?>">Gérer les phrases enregistrées</a>
