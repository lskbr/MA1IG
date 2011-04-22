<?php
if($news->getLanguage()->getFlag()!=null):
?>
<img class="small_flag" src="/uploads/flags/<?php echo $news->getLanguage()->getFlag();?>"/>
<?php endif; ?>