<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($category->getId(), 'category_edit', $category) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_position">
  <?php echo $category->getPosition() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_activated">
  <?php echo get_partial('category/list_field_boolean', array('value' => $category->getIsActivated())) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($category->getCreatedAt()) ? format_date($category->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($category->getUpdatedAt()) ? format_date($category->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
