<h1>Réglez les paramètres du site Web</h1>
<?php
function display($configs,$config,$first=false)
{
	if(!$first)
		echo '<div class="leveled">';
	else
		echo '<div>';
	if($config->getType()==1)
		echo checkbox_tag($config);
	else
		echo textfield_tag($config);
	for($i=0; $i<sizeof($configs); $i++)
		if($configs[$i]->getParent()->__toString()==$config->getName())
			display($configs,$configs[$i]);
	echo '</div>';
}
echo form_tag('configuration/update');
use_helper('ConfigForm');
foreach($configs as $config)
{
	if($config->getParent()->__toString()=="")
		display($configs,$config,true);
}
?>
<input type="submit" value="Valider" >
</form>