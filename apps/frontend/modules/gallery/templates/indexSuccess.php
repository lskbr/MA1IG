<h1>Galerys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Position</th>
      <th>Is activated</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($galerys as $galery): ?>
    <tr>
      <td><a href="<?php echo url_for('gallery/'.$galery->getId()) ?>"><?php echo $galery->getId() ?></a></td>
      <td><a href="<?php echo url_for('gallery/'.$galery->getId()) ?>"><?php echo $galery->getName() ?></a></td>
      <td><?php echo $galery->getPosition() ?></td>
      <td><?php echo $galery->getIsActivated() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

