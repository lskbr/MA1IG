<div style="margin: 15px 0 10px 0; border-top: 2px #bbbbbb dotted; height: 1px; width: 100px;"></div>

<div style="display: inline; float: left; margin-right: 3px">
    <b><?php echo __('Partager') ?> :</b>
</div>

<div style="display: inline" class="addthis_toolbox addthis_default_style"
     addthis:url="<?php echo $url_news ?>"
     addthis:title="<?php echo $url_title ?>"
     addthis:description="<?php echo $url_description ?>">

    <a class="addthis_button_facebook" title="<?php echo __('Partager sur Facebook') ?>"></a>
    <a class="addthis_button_twitter" title="<?php echo __('Partager sur Twitter') ?>"></a>
    <a class="addthis_button_grainedevie.org" title="<?php echo __('Signaler') ?>"></a>
    <span class="addthis_separator">|</span>
    <a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d92ffa329add9af" class="addthis_button_compact"></a>
</div>