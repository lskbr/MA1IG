<?php 
function homepageItem($name, $desc, $route, $img=null)
{
	$txt='<a class="case_homepage" href="'.url_for($route).'"><div class="case_txt">';
	if($img!==null)
	{
		if(substr($img,0,4)=='add_')
			$txt.='<img src="/images/icons/'.substr($img,4).'.png"/><img class="add" src="/images/icons/add.png"/>';
		else
			$txt.='<img src="/images/icons/'.$img.'.png"/>';
	}
	$txt.=$name.' </div>';
	$txt.='<div class="desc">'.$desc.'</div></a>';
	return $txt;
} ?>