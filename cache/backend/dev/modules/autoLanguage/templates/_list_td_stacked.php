<td colspan="3">
  <?php echo __('%%flag%% - %%name%% - %%abbreviation%%', array('%%flag%%' => get_partial('language/flag', array('type' => 'list', 'language' => $language)), '%%name%%' => link_to($language->getName(), 'language_edit', $language), '%%abbreviation%%' => link_to($language->getAbbreviation(), 'language_edit', $language)), 'messages') ?>
</td>
