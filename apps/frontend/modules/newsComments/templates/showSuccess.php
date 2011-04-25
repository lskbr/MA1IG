<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $news_comments->getId() ?></td>
    </tr>
    <tr>
      <th>Content:</th>
      <td><?php echo $news_comments->getContent() ?></td>
    </tr>
    <tr>
      <th>Author:</th>
      <td><?php echo $news_comments->getAuthorId() ?></td>
    </tr>
    <tr>
      <th>News:</th>
      <td><?php echo $news_comments->getNewsId() ?></td>
    </tr>
    <tr>
      <th>Father:</th>
      <td><?php echo $news_comments->getFatherId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $news_comments->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $news_comments->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('newsComments/edit?id='.$news_comments->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('newsComments/index') ?>">List</a>
