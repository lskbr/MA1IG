<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $sf_guard_user->getId() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
    </tr>
    <tr>
      <th>Email address:</th>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
    </tr>
    <tr>
      <th>Algorithm:</th>
      <td><?php echo $sf_guard_user->getAlgorithm() ?></td>
    </tr>
    <tr>
      <th>Salt:</th>
      <td><?php echo $sf_guard_user->getSalt() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $sf_guard_user->getPassword() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $sf_guard_user->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Is super admin:</th>
      <td><?php echo $sf_guard_user->getIsSuperAdmin() ?></td>
    </tr>
    <tr>
      <th>Last login:</th>
      <td><?php echo $sf_guard_user->getLastLogin() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $sf_guard_user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $sf_guard_user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$sf_guard_user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
