<?php

function getThumbnailDir($path){
	 if(strpos($path, "thumbnailGrande/") === false){
		   $thumbpath = $path;
   }else{
        $thumbpath = strstr($path, "thumbnailGrande/", true); // Removes thumbnailGrande - special case for thumbnails.
   }
	 return $thumbpath.'thumbnail/';
  }
  
function getThumbnailURL($path, $file){
   return getThumbnailDir($path).$file;
  }  
  
?>