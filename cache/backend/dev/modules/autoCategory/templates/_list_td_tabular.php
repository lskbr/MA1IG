<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($category->getName(), 'category_edit', $category) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_isActivated">
  <?php echo get_partial('category/isActivated', array('type' => 'list', 'category' => $category)) ?>
</td>
