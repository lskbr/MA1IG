<h2>Nos Partenaires</h2>
<p>Nombreuses sont les entreprises soucieuses de l'environnement, vous aussi, compensez votre empreinte écologique et profitez des avantages fiscaux <a href="">(en savoir plus)</a>
<br/>



<?php 
	for($i=0;$i<count($partner);$i++)
	{
		echo "<div class='partner_col1'>";
		echo "<img src='/uploads/logos/".$partner[$i]->getLogo()."'/>";
		echo "<a href='".$partner[$i]->getSite()."' target='_blank'><h3>".$partner[$i]->getCompanyName()."</h3></a>";
		echo "<br/>".$partner[$i]->getDescription();
		echo "</div>";
	}
?>