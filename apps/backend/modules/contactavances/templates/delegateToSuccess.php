<div class="forwardTo_<?php echo $message->getId(); ?>">
<?php
if ($message->getForwardToId() != null) {
    $forwardTo = PersonTable::getInstance()->findOneBy('id', $message->getForwardToId());
    echo $forwardTo->getFirstName() . " " . $forwardTo->getLastName();
}else{
    echo __('Non défini');
}
?>
</div>