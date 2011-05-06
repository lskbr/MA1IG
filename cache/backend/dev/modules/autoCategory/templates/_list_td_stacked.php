<td colspan="2">
  <?php echo __('%%name%% - %%isActivated%%', array('%%name%%' => link_to($category->getName(), 'category_edit', $category), '%%isActivated%%' => get_partial('category/isActivated', array('type' => 'list', 'category' => $category))), 'messages') ?>
</td>
