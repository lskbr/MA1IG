<?php
function menu_item($name, $route, $sf_context, $îmg=null)
{
	$current_route=$sf_context->getRouting()->getCurrentRouteName();

	if(strstr($current_route,$route))
		return '<li class="current"><a>'.$name.'</a></li>';
	return '<li><a href="'.url_for($route).'">'.$name.'</a></li>';
}