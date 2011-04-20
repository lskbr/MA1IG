<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $galery->getId() ?></td>
    </tr>
    <tr>
      <th>Position:</th>
      <td><?php echo $galery->getPosition() ?></td>
    </tr>
    <tr>
      <th>Is activated:</th>
      <td><?php echo $galery->getIsActivated() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $galery->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $galery->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('galery/edit?id='.$galery->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('galery/index') ?>">List</a>
