<center><h1>Liste des questions</h1></center>
<ul>
<?php foreach($questions as $question):?>
    <li><a href="#" class="questionsFromFaq" id="<?php echo $question->getId(); ?>" content="<?php echo $question->getAnswer();?>"><?php echo $question->getQuestion(); ?></a></li>
<?php endforeach; ?>
</ul>