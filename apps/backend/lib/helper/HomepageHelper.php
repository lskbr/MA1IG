<?php 
function homepageItem($name, $desc, $route, $img=null)
{
	$txt='<a class="case_homepage" href="'.url_for($route).'"><div class="case_txt">';
	if($img!==null)
		$txt.='<img src="/images/icons/'.$img.'.png"/>';
	$txt.=$name.' </div>';
	$txt.='<div>'.$desc.'</div></a>';
	return $txt;
} ?>