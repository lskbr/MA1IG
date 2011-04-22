<?php
if($guestbook->getLanguage()->getFlag()!=null):
?>
<img class="small_flag" src="/uploads/flags/<?php echo $guestbook->getLanguage()->getFlag();?>"/>
<?php endif; ?>