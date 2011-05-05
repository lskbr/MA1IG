<td class="sf_admin_text sf_admin_list_td_flag">
  <?php echo get_partial('guestbook/flag', array('type' => 'list', 'guestbook' => $guestbook)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_content">
  <?php echo link_to($guestbook->getContent(), 'guestbook_edit', $guestbook) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo get_partial('guestbook/created_at', array('type' => 'list', 'guestbook' => $guestbook)) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_validated">
  <?php echo get_partial('guestbook/is_validated', array('type' => 'list', 'guestbook' => $guestbook)) ?>
</td>
