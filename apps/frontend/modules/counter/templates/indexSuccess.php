<h1>Counters List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Initial number</th>
      <th>Initial date</th>
      <th>Flow</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($counters as $counter): ?>
    <tr>
      <td><a href="<?php echo url_for('counter/show?id='.$counter->getId()) ?>"><?php echo $counter->getId() ?></a></td>
      <td><?php echo $counter->getInitialNumber() ?></td>
      <td><?php echo $counter->getInitialDate() ?></td>
      <td><?php echo $counter->getFlow() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('counter/new') ?>">New</a>
