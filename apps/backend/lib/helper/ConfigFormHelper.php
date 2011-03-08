<?php

function checkbox_tag($config)
{
	$txt='<input type="checkbox" name="options['.$config->getId().']" value="true"';
	if($config->isActivated())
		$txt.='checked="checked"';
	if((!($config->getParent()->__toString()=="") && !$config->getParent()->isActivated())||$config->getIsKernel()==true)
		$txt.='disabled="disabled"';
	$txt.='/> : '.$config->getName().'<br/>';
	$txt.='<span class="desc">'.$config->getDescription().'</span>';
	return $txt;
}
function textfield_tag($config)
{
	$txt= '<input type="text" name="options['.$config->getId().']" value="'.$config->getValue().'"';
	if(!$config->getParent()->isActivated())
		$txt.= 'disabled="disabled"';
	$txt.= 'class="input-tiny"/> : '.$config->getName().'<br/>';
	$txt.= '<span class="desc">'.$config->getDescription().'</span>';
}