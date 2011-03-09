<h1>Sf guard users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Email address</th>
      <th>Username</th>
      <th>Algorithm</th>
      <th>Salt</th>
      <th>Password</th>
      <th>Is active</th>
      <th>Is super admin</th>
      <th>Last login</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_users as $sf_guard_user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/show?id='.$sf_guard_user->getId()) ?>"><?php echo $sf_guard_user->getId() ?></a></td>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
      <td><?php echo $sf_guard_user->getAlgorithm() ?></td>
      <td><?php echo $sf_guard_user->getSalt() ?></td>
      <td><?php echo $sf_guard_user->getPassword() ?></td>
      <td><?php echo $sf_guard_user->getIsActive() ?></td>
      <td><?php echo $sf_guard_user->getIsSuperAdmin() ?></td>
      <td><?php echo $sf_guard_user->getLastLogin() ?></td>
      <td><?php echo $sf_guard_user->getCreatedAt() ?></td>
      <td><?php echo $sf_guard_user->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
