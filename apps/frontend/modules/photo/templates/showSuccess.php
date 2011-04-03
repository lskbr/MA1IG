<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $photo->getId() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $photo->getUrl() ?></td>
    </tr>
    <tr>
      <th>Publication start:</th>
      <td><?php echo $photo->getPublicationStart() ?></td>
    </tr>
    <tr>
      <th>Publication end:</th>
      <td><?php echo $photo->getPublicationEnd() ?></td>
    </tr>
    <tr>
      <th>Galery:</th>
      <td><?php echo $photo->getGaleryId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $photo->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $photo->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('photo/edit?id='.$photo->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('photo/index') ?>">List</a>
