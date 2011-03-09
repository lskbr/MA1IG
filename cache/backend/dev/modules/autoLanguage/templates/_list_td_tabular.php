<td class="sf_admin_text sf_admin_list_td_flag">
  <?php echo get_partial('language/flag', array('type' => 'list', 'language' => $language)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($language->getName(), 'language_edit', $language) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_abbreviation">
  <?php echo $language->getAbbreviation() ?>
</td>
