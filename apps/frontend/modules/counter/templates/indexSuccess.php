<h1>Counters List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Initial date</th>
      <th>Initial number</th>
      <th>Period</th>
      <th>Objective number</th>
      <th>Slogan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($counters as $counter): ?>
    <tr>
      <td><a href="<?php echo url_for('counter/show?id='.$counter->getId()) ?>"><?php echo $counter->getId() ?></a></td>
      <td><?php echo $counter->getInitialDate() ?></td>
      <td><?php echo $counter->getInitialNumber() ?></td>
      <td><?php echo $counter->getPeriod() ?></td>
      <td><?php echo $counter->getObjectiveNumber() ?></td>
      <td><?php echo $counter->getSlogan() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('counter/new') ?>">New</a>
