<table>
  <tbody>
    <tr>
      <th>Nom:</th>
      <td><?php echo $galery->getName() ?></td>
    </tr>
  </tbody>
</table>

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
         $image_link = "/uploads/photo/".$photo->getUrl();
         $image_thumb_link = "/uploads/photo/thumbnail/".$photo->getUrl();
         $x++;?>
            <td> <a href="<?php echo $image_link ?>">
                 <img src="<?php echo $image_thumb_link ?>">
                 </a>
            </td>
         <?php if($x==$photos_per_line):  
           $x=0;?>
         </tr>
         <?php endif; ?>
    <?php endforeach; ?>  </tbody>
</table>
<?php echo link_to( __("Gallerie"), "galleryIndex"); ?>
