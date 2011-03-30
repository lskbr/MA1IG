<?php
function menu_item($name, $route, $sf_context, $config=null)
{
	$current_route=$sf_context->getRouting()->getCurrentRouteName();

	if($config ==null || config::getInstance()->get($config))
	{
		if(strstr($current_route,$route))
			echo '<li class="current"><a href="'.url_for($route).'">'.$name.'</a></li>';
		echo '<li><a href="'.url_for($route).'">'.$name.'</a></li>';
	}
}