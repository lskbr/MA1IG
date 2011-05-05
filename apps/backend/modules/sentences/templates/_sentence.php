<center><h1>Phrases enregistrées</h1></center>
<ul>
<?php foreach ($standardSentences as $standardSentence): ?>
    <li><a href="#" class="linkStandardSentences" content="<?php echo $standardSentence->getText(); ?>"><?php echo $standardSentence->getTitle(); ?></a></li>
<?php endforeach; ?>
</ul>
<a href="<?php echo url_for1('sentences')?>">Gérer les phrases enregistrées</a>
