<form id="lang_selector" class="lang_change" action="<?php echo url_for('change_language') ?>">
	<?php echo __('Langue du site :') ?>
  	<select name="language" id="language">
  	<?php 
  	foreach($languages as $l)
  	{
  		echo '<option value="'.$l->getAbbreviation().'"';
	  	if($culture==$l->getAbbreviation())
	  		echo ' selected="selected" ';
  		echo '>'.$l->getName().'</option>';
  	}
  	?>
	</select>
	<?php echo $form->renderHiddenFields() ?>
    <span id="lang_submit"><input type="submit" value="<?php echo __('Ok') ?>" /></span>
</form>