<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>

  <?php $i_attr = 1; ?>
  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    
    <?php
    if ($i_attr == 1) $disabled_attr = array('readonly' => 'readonly');
    elseif ($i_attr == 2) $disabled_attr = array('size' => '50');
    else $disabled_attr = array();

    $i_attr++;
    ?>

    <?php include_partial('bilan_carbone_coeff/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', $disabled_attr),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>
  <?php endforeach; ?>
</fieldset>
