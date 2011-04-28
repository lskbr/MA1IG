<div class="gallery_title">
  <h1><?php echo __('Galerie photos')?></h1>
</div>

<?php foreach ($galerys as $galery): ?>
    <div class="gallery_thumb">
      <?php $image_thumb_link=$galery->getPhoto();
      $image_thumb_link="/uploads/photo/thumbnail/".$image_thumb_link[0]->getUrl();
      $photo_count=sizeof($galery->getPhoto())?>
     <a href="<?php echo url_for('gallery/'.$galery->getId()) ?>"> <img class="photo_thumb_padding" src="<?php echo $image_thumb_link ?>"></a>
      <a href="<?php echo url_for('gallery/'.$galery->getId()) ?>"><?php echo $galery->getName() ?></a>
     <p> <?php echo $photo_count.' '.format_number_choice('[1]photo|(1,+Inf]photos',array(),$photo_count); ?></p>
    </div>
<?php endforeach; ?>