<?php
function menu_item($name, $route, $sf_context, $config=null, $help=null)
{
	$current_route=$sf_context->getRouting()->getCurrentRouteName();

	if($config ==null || config::getInstance()->get($config))
	{
		if($current_route==$route || $current_route==($route.'_new'))
			echo '<li class="current">';
		else
			echo '<li>';
		if($help!=null)
			echo '<a class="help_icon" href="../'.$help.'.html" target="_blank"><img src="/images/icons/help.png"/></a>';		
		echo '<a class="list_item" href="'.url_for($route).'">'.$name.'</a>';
		echo '</li>';
	}
}