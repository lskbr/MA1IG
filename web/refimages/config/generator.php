<?php
//$font = "/arial.ttf";

class RefImage {
	public static function makeTextBlock($text, $fontfile, $fontsize, $width)
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
	
	public static function createPartnerImage()
	{
		
	}
	
	public static function createPartnerPreview($text1, $text2, $text3)
	{
		$img_name = "test.png";
		$font = "arial.ttf";
		$fontsize = 11;
		
		$text1 = RefImage::makeTextBlock($text1, $font, $fontsize, 100);
		$text2 = RefImage::makeTextBlock($text2, $font, $fontsize, 100);
		
		$image=imagecreatefrompng("0de82d15502b2c01f71d3d69bdcc996e6506aeff.png" );
		//ImageCopy($back, $logo, 400, 15, 0, 0, 31, 40); 
		//$grey = imagecolorallocate($back, 128, 128, 128);
		$black = imagecolorallocate($image, 0, 0, 128);  
		//imagettftext($back, 350, 10, 11, 21, $font, $text1);
		
		imagettftext($image, 11, 0, 120, 10, $black, $font, $text1);
		imagettftext($image, 11, 0, 500, 35, $black, $font, $text2);
		imagettftext($image, 11, 0, 335, 50, $black, $font, $text3);
		
		imagepng($image);
		imagedestroy($image);
	}
}

//header('Content-Type: image/png');
//RefImage::createPartnerPreview('Text  qqsd qsdqs d1', 'Text 2', 'Text 3');


// Create the image
$im = imagecreatetruecolor(400, 300);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 100, $white);

// The text to draw
$text = 'Testing...';
// Replace path by your own font path
$font = 'arial.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 0, 10, 20, $white, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
