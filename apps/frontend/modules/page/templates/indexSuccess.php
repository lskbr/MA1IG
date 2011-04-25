<?php 
slot('title', __('Bienvenue !'));

if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
?>


<div class="homepage_col1">
<?php
if(config::getInstance()->get('news'))
  include_component('news', 'news');?>
</div>


<div class="homepage_col2">
<?php 
if(config::getInstance()->get('guestbook'))
  include_component('guestbook', 'guestbook');
?>
</div>