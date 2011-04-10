<?php 
if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
include_component('guestbook', 'guestbook');?>
