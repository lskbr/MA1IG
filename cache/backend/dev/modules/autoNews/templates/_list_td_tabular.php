<td class="sf_admin_text sf_admin_list_td_flag">
  <?php echo get_partial('news/flag', array('type' => 'list', 'news' => $news)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($news->getTitle(), 'news_edit', $news) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_publication_date">
  <?php echo get_partial('news/publication_date', array('type' => 'list', 'news' => $news)) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_activated">
  <?php echo get_partial('news/is_activated', array('type' => 'list', 'news' => $news)) ?>
</td>
