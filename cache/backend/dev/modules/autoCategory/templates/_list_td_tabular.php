<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($category->getName(), 'category_edit', $category) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_activated">
  <?php echo get_partial('category/list_field_boolean', array('value' => $category->getIsActivated())) ?>
</td>
