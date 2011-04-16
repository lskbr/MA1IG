<div class="unread_message"><?php if($message->getReadAt()== null){echo "Nouveau";}?></div>
<div class="unreplied_message"><?php if($message->getReadAt() != null && $message->getReplyAt() == null){echo "Non répondu";}?></div>
<div class="replied_message"><?php if($message->getReadAt() != null && $message->getReplyAt() != null){echo "Répondu";}?></div>
