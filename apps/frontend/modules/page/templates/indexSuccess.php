<?php 
if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
if(config::getInstance()->get('guestbook'))
  include_component('guestbook', 'guestbook');
if(config::getInstance()->get('news'))
  include_component('news', 'news');?>