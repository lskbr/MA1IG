<?php
if($photo->getUrl()!=null):
?>
<img class="photo_small" src="/uploads/photo/thumbnail/<?php echo $photo->getUrl();?>"/>

<?php endif; ?>