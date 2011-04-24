<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $counter->getId() ?></td>
    </tr>
    <tr>
      <th>Initial number:</th>
      <td><?php echo $counter->getInitialNumber() ?></td>
    </tr>
    <tr>
      <th>Initial date:</th>
      <td><?php echo $counter->getInitialDate() ?></td>
    </tr>
    <tr>
      <th>Flow:</th>
      <td><?php echo $counter->getFlow() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('counter/edit?id='.$counter->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('counter/index') ?>">List</a>
