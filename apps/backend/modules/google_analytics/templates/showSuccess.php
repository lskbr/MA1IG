<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $google_analytics->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $google_analytics->getCode() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('google_analytics/edit?id='.$google_analytics->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('google_analytics/index') ?>">List</a>
