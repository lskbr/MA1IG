<td colspan="4">
  <?php echo __('%%flag%% - %%content%% - %%created_at%% - %%is_validated%%', array('%%flag%%' => get_partial('guestbook/flag', array('type' => 'list', 'guestbook' => $guestbook)), '%%content%%' => link_to($guestbook->getContent(), 'guestbook_edit', $guestbook), '%%created_at%%' => get_partial('guestbook/created_at', array('type' => 'list', 'guestbook' => $guestbook)), '%%is_validated%%' => get_partial('guestbook/is_validated', array('type' => 'list', 'guestbook' => $guestbook))), 'messages') ?>
</td>
