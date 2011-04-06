<?php
if($photo->getUrl()!=null):
?>
<img class="photo_single" src="/uploads/photo/<?php echo $photo->getUrl();?>"/>

<?php endif; ?>