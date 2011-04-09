<h2>Foire aux Questions</h2>
<?php
	echo __("<div class='faq_categQuestions'>");
	for($i=0;$i<count($faq_category);$i++)
	{
		if($i>0)
			echo ' - ';
		echo "<a href='#".$faq_category[$i]->getName()."'>".$faq_category[$i]->getName()."</a></h3>";
	}
	echo "</div></br>";
	$categ="***";
	for($i=0;$i<count($faq);$i++)
	{
		if($categ!=$faq[$i]->getFaqCategory())
		{
			$categ=$faq[$i]->getFaqCategory();

			echo "</br><a name='".$categ."'><h2>".$categ."</h2></a>";
		}
		echo "</br><div class='faq_question'><h3>".$faq[$i]->getQuestion()."</h3></div>";
		echo "<div class='faq_answer'>".$faq[$i]->getAnswer()."</div></br>";
	}
?>