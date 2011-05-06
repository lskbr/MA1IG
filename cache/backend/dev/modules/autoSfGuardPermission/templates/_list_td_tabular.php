<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($sf_guard_permission->getName(), 'sf_guard_permission_edit', $sf_guard_permission) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $sf_guard_permission->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_groupList">
  <?php echo get_partial('sfGuardPermission/groupList', array('type' => 'list', 'sf_guard_permission' => $sf_guard_permission)) ?>
</td>
