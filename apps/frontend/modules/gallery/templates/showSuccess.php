
<h1><?php echo $galery->getName() ?></h1>
<table>
  <thead>
  </thead>
  <tbody>
    <?php 
       $photos_per_line = 4;
       $x=0;
       foreach ($photos as $photo):
         if($x==0):  ?>
         <tr>
         <?php endif;
         $image_link = "/uploads/photo/thumbnailGrande/".$photo->getUrl();
         $image_thumb_link = "/uploads/photo/thumbnail/".$photo->getUrl();
         $x++;?>
            <td> <a href="<?php echo $image_link ?>" rel="lightbox-gallery">
                 <img class="photo_thumb" src="<?php echo $image_thumb_link ?>">
                 </a>
            </td>
         <?php if($x==$photos_per_line):  
           $x=0;?>
         </tr>
         <?php endif; ?>
    <?php endforeach; ?>  </tbody>
</table>
<?php echo link_to( __("Retour"), "galleryIndex"); ?>
