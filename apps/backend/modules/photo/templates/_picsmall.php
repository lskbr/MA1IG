<?php
if($photo->getUrl()!=null):
?>
<img class="photo_small" src="/uploads/photo/<?php echo $photo->getUrl();?>"/>

<?php endif; ?>