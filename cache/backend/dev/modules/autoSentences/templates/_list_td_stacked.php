<td colspan="2">
  <?php echo __('%%title%% - %%text%%', array('%%title%%' => link_to($standard_sentence->getTitle(), 'standard_sentence_edit', $standard_sentence), '%%text%%' => $standard_sentence->getText()), 'messages') ?>
</td>
