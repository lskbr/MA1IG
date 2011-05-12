<?php
function makeTextBlock($text, $fontfile, $fontsize, $width) 
{
	$words = explode(' ', $text);
	$lines = array($words[0]);
	$currentLine = 0;
	for($i = 1; $i < count($words); $i++) {
		$lineSize = imagettfbbox($fontsize, 0, $fontfile, $lines[$currentLine] . ' ' . $words[$i]);
		if($lineSize[2] - $lineSize[0] < $width) {
			$lines[$currentLine] .= ' ' . $words[$i]; 
        } else {
			$currentLine++;
			$lines[$currentLine] = $words[$i];
		}
	}
	
	return implode("\n", $lines); 
}

function create_partner_image($text1, $text2,$text3)
{
	$img_name = "test.png";
	$font = 'arial.ttf';
	$fontsize = 11;
	$text1 = makeTextBlock($text1, $font, $fontsize, 100);
	$text2 = makeTextBlock($text2, $font, $fontsize, 100);
	$logo=ImageCreateFromPNG("8.png" ); 
	$back=ImageCreateFromPNG("header-logo1.png" ); 
	//ImageCopy($back, $logo, 400, 15, 0, 0, 31, 40); 
	//$grey = imagecolorallocate($back, 128, 128, 128);
	//background and text color
	//$back= imagecolorallocatealpha ( $back, 255, 255, 255, 0 );
	//$back = imagecolorallocate($back, 25, 47, 127);
	$black = imagecolorallocate($back, 0, 0, 0);
	//imagettftext($back, 350, 10, 11, 21, $font, $text1);
	imagettftext($back, 11, 0, 220, 35,$black, $font, $text1);
	imagettftext($back, 11, 0, 500, 35,$black, $font, $text2);
	//imagettftext($back, 11, 0, 335, 50,$black, $font, $text3); 
	ImageCopy($back, $logo, 335, 15, 0, 0, 31, 40);
	ImageCopy($back, $logo, 360, 15, 0, 0, 31, 40);
	ImageCopy($back, $logo, 385, 15, 0, 0, 31, 40);
	ImageCopy($back, $logo, 410, 15, 0, 0, 31, 40);
	ImageCopy($back, $logo, 435, 15, 0, 0, 31, 40);
	ImagePNG($back, $img_name);
	
	return $img_name;
}

?>
