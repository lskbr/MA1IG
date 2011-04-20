<h1>Galerys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Position</th>
      <th>Is activated</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($galerys as $galery): ?>
    <tr>
      <td><a href="<?php echo url_for('galery/show?id='.$galery->getId()) ?>"><?php echo $galery->getId() ?></a></td>
      <td><?php echo $galery->getPosition() ?></td>
      <td><?php echo $galery->getIsActivated() ?></td>
      <td><?php echo $galery->getCreatedAt() ?></td>
      <td><?php echo $galery->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('galery/new') ?>">New</a>
