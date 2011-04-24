<?php 
slot('title', __('Bienvenue !'));

if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
?>


<table id="homepage_table">
    <tr>
        <td class="homepage_cols">
<?php
if(config::getInstance()->get('news'))
  include_component('news', 'news');
?>   
        </td>
        <td class="homepage_cols">
<?php 
if(config::getInstance()->get('guestbook'))
  include_component('guestbook', 'guestbook');
?>
        </td>
    </tr>
</table>