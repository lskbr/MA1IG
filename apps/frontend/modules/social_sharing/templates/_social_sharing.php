<?php use_javascript('addthis.js'); ?>

<div class="addthis_toolbox addthis_default_style"
     addthis:url="http://www.example.com"
     addthis:title="An Example Title"
     addthis:description="An Example Description">

        <a class="addthis_button_facebook" title="<?php echo __('Partager sur Facebook') ?>"></a>
        <a class="addthis_button_twitter" title="<?php echo __('Partager sur Twitter') ?>"></a>
        <a class="addthis_button_grainedevie.seaflat.be" title="<?php echo __('Signaler') ?>"></a>
        <span class="addthis_separator">|</span>
        <a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d92ffa329add9af" class="addthis_button_compact"> <?php echo __('Partager') ?></a>
</div>