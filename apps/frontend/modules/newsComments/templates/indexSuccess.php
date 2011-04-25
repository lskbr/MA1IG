<h1>News commentss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Content</th>
      <th>Author</th>
      <th>News</th>
      <th>Father</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($news_commentss as $news_comments): ?>
    <tr>
      <td><a href="<?php echo url_for('newsComments/show?id='.$news_comments->getId()) ?>"><?php echo $news_comments->getId() ?></a></td>
      <td><?php echo $news_comments->getContent() ?></td>
      <td><?php echo $news_comments->getAuthorId() ?></td>
      <td><?php echo $news_comments->getNewsId() ?></td>
      <td><?php echo $news_comments->getFatherId() ?></td>
      <td><?php echo $news_comments->getCreatedAt() ?></td>
      <td><?php echo $news_comments->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('newsComments/new') ?>">New</a>
