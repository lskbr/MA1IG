<td class="sf_admin_text sf_admin_list_td_status">
  <?php echo get_partial('contactavances/status', array('type' => 'list', 'message' => $message)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_sender_name">
  <?php echo link_to($message->getSenderName(), 'contactavances_edit', $message) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_faq_category">
  <?php echo $message->getFaqCategory() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_created_at">
  <?php echo $message->getCreatedAt() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_read_at">
  <?php echo $message->getReadAt() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_folderjs">
  <?php echo get_partial('contactavances/folderjs', array('type' => 'list', 'message' => $message)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_responder">
  <?php echo get_partial('contactavances/responder', array('type' => 'list', 'message' => $message)) ?>
</td>
