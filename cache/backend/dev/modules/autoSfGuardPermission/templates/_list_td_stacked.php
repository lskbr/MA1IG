<td colspan="3">
  <?php echo __('%%name%% - %%description%% - %%groupList%%', array('%%name%%' => link_to($sf_guard_permission->getName(), 'sf_guard_permission_edit', $sf_guard_permission), '%%description%%' => $sf_guard_permission->getDescription(), '%%groupList%%' => get_partial('sfGuardPermission/groupList', array('type' => 'list', 'sf_guard_permission' => $sf_guard_permission))), 'messages') ?>
</td>
