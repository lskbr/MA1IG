<h1>Réglez les paramètres du site Web</h1>
<?php
function display($configs,$config,$first=false)
{
	if(!$first)
		echo '<div class="leveled">';
	else
		echo '<div>';
	if($config->getType()==1)
	{
		echo '<input type="checkbox" name="options['.$config->getId().']" value="true"';
		if($config->isActivated())
			echo 'checked="checked"';
		if((!($config->getParent()->__toString()=="") && !$config->getParent()->isActivated())||$config->getIsKernel()==true)
			echo 'disabled="disabled"';
		echo'/> : '.$config->getName().'<br/>';
		echo '<span class="desc">'.$config->getDescription().'</span>';
	}
	else
	{
		echo '<input type="text" name="options['.$config->getId().']" value="'.$config->getValue().'"';
		if(!$config->getParent()->isActivated())
			echo 'disabled="disabled"';
		echo 'class="input-tiny"/> : '.$config->getName().'<br/>';
		echo '<span class="desc">'.$config->getDescription().'</span>';
	}
	for($i=0; $i<sizeof($configs); $i++)
	{
		if($configs[$i]->getParent()->__toString()==$config->getName())
			display($configs,$configs[$i]);
	}
	echo '</div>';
}
echo form_tag('configuration/update');
foreach($configs as $config)
{
	if($config->getParent()->__toString()=="")
		display($configs,$config,true);
}
?>
<input type="submit" value="Valider" >
</form>