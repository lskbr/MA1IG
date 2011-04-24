<form class="lang_change" action="<?php echo url_for('change_language') ?>">
	Langue:
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
	<input type="submit" value="ok" />
</form>