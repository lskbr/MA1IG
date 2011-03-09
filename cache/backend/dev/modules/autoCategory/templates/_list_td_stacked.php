<td colspan="3">
  <?php echo __('%%name%% - %%isActivated%% - %%position%%', array('%%name%%' => link_to($category->getName(), 'category_edit', $category), '%%isActivated%%' => get_partial('category/isActivated', array('type' => 'list', 'category' => $category)), '%%position%%' => $category->getPosition()), 'messages') ?>
</td>
