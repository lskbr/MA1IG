<td colspan="4">
  <?php echo __('%%username%% - %%name%% - %%last_login%% - %%listGroup%%', array('%%username%%' => link_to($sf_guard_user->getUsername(), 'sf_guard_user_edit', $sf_guard_user), '%%name%%' => $sf_guard_user->getName(), '%%last_login%%' => false !== strtotime($sf_guard_user->getLastLogin()) ? format_date($sf_guard_user->getLastLogin(), "f") : '&nbsp;', '%%listGroup%%' => get_partial('sfGuardUser/listGroup', array('type' => 'list', 'sf_guard_user' => $sf_guard_user))), 'messages') ?>
</td>
