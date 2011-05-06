<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($sf_guard_group->getName(), 'sf_guard_group_edit', $sf_guard_group) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $sf_guard_group->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_listPermissions">
  <?php echo get_partial('sfGuardGroup/listPermissions', array('type' => 'list', 'sf_guard_group' => $sf_guard_group)) ?>
</td>
