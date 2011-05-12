<h1>Nos Partenaires</h1>
<p>
<?php 
	echo __('Nombreuses sont les entreprises soucieuses de l\'environnement, vous aussi, compensez votre empreinte écologique et profitez des avantages fiscaux.'); 
?>
<br/>



<?php 
	for($i=0;$i<count($partner);$i++)
	{
		echo "<div class='partner_col1'>";
		echo "<a href='partner/".$partner[$i]->getId()."' target='_blank'><img src='/uploads/logos/".$partner[$i]->getLogo()."'/></a>";
		echo "<a href='partner/".$partner[$i]->getId()."' target='_blank'><h3>".$partner[$i]->getCompanyName()."</h3></a>";
		echo "<br/>".$partner[$i]->getDescription();
		echo "</div>";
	}
?>