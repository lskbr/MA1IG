<td colspan="4">
  <?php echo __('%%flag%% - %%title%% - %%publication_date%% - %%is_activated%%', array('%%flag%%' => get_partial('news/flag', array('type' => 'list', 'news' => $news)), '%%title%%' => link_to($news->getTitle(), 'news_edit', $news), '%%publication_date%%' => get_partial('news/publication_date', array('type' => 'list', 'news' => $news)), '%%is_activated%%' => get_partial('news/is_activated', array('type' => 'list', 'news' => $news))), 'messages') ?>
</td>
