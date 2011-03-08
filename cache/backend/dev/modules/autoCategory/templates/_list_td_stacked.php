<td colspan="2">
  <?php echo __('%%name%% - %%is_activated%%', array('%%name%%' => link_to($category->getName(), 'category_edit', $category), '%%is_activated%%' => get_partial('category/list_field_boolean', array('value' => $category->getIsActivated()))), 'messages') ?>
</td>
