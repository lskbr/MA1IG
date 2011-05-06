<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo link_to($sf_guard_user->getUsername(), 'sf_guard_user_edit', $sf_guard_user) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $sf_guard_user->getName() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_login">
  <?php echo false !== strtotime($sf_guard_user->getLastLogin()) ? format_date($sf_guard_user->getLastLogin(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_listGroup">
  <?php echo get_partial('sfGuardUser/listGroup', array('type' => 'list', 'sf_guard_user' => $sf_guard_user)) ?>
</td>
