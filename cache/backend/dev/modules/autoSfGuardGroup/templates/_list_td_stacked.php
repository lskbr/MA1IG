<td colspan="3">
  <?php echo __('%%name%% - %%description%% - %%listPermissions%%', array('%%name%%' => link_to($sf_guard_group->getName(), 'sf_guard_group_edit', $sf_guard_group), '%%description%%' => $sf_guard_group->getDescription(), '%%listPermissions%%' => get_partial('sfGuardGroup/listPermissions', array('type' => 'list', 'sf_guard_group' => $sf_guard_group))), 'messages') ?>
</td>
