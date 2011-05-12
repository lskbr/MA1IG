<div class="sf_admin_form_row sf_admin_form_field_image">
  <div>
    <label for="ref_image_image"><?php echo __("Image de référancement") ?></label>
    <div class="content"><img src="/refimages/config/0de82d15502b2c01f71d3d69bdcc996e6506aeff.png"/></div>
  </div>
</div>
<div id="custom_data">
<?php
$count = 1;
$lang = array();
$parameters = '';
$t_count = 1;

$coeff = Doctrine_Core::getTable('BilanCarboneCoeff')->createQuery('a')->
	select('a.coeff')->where('a.name_short=?', 'cost_tree')->execute();
$coeff = $coeff[0]->get('coeff');

foreach(Doctrine_Core::getTable('Language')->createQuery('a')->
		select('a.id, a.abbreviation')->execute() as $key => $value) {
	$lang[$value->get('abbreviation')] = $value->get('id');
}

foreach(RefTextParamTable::getTextParams() as $key => $params) {
	$parameters .= $params->getParams().($t_count++ < 3 ? '|' : '');
}

?><input type="hidden" value="<?php echo $coeff ?>" id="<?php
		echo "cd-coeff" ?>" /><?php print("\n\r");

?><input type="hidden" value="<?php echo $parameters ?>" id="<?php
		echo "cd-params" ?>" /><?php print("\n\r");

foreach(SloganTable::getRefImgSlogans() as $key1 => $slogan) {
	?><input type="hidden" value="<?php echo $slogan->getName() ?>" id="<?php
		echo "cd-slogan-".$count ?>" /><?php print("\n\r");
	foreach(SloganTable::getContent($slogan->getName(), 'position 1') as $key2 => $value) {
		?><input type="hidden" value="<?php echo $value->get('content') ?>" id="<?php
			echo "cd-slogan-".$count.'1'.$lang[$value->get('lang')] ?>" /><?php print("\n\r");
	}
	foreach(SloganTable::getContent($slogan->getName(), 'position 2') as $key2 => $value) {
		?><input type="hidden" value="<?php echo $value->get('content') ?>" id="<?php
			echo "cd-slogan-".$count.'2'.$lang[$value->get('lang')] ?>" /><?php print("\n\r");
	}
	$count++;
}
?></div>
