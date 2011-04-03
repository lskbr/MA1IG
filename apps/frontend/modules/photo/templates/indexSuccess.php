<h1>Photos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Url</th>
      <th>Publication start</th>
      <th>Publication end</th>
      <th>Galery</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($photos as $photo): ?>
    <tr>
      <td><a href="<?php echo url_for('photo/show?id='.$photo->getId()) ?>"><?php echo $photo->getId() ?></a></td>
      <td><?php echo $photo->getUrl() ?></td>
      <td><?php echo $photo->getPublicationStart() ?></td>
      <td><?php echo $photo->getPublicationEnd() ?></td>
      <td><?php echo $photo->getGaleryId() ?></td>
      <td><?php echo $photo->getCreatedAt() ?></td>
      <td><?php echo $photo->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('photo/new') ?>">New</a>
