<?php use_helper('I18N') ?>
<h2><?php echo __('Bonjour %name%', array('%name%' => $user->getName())) ?></h2>

<h3><?php echo __('Veuillez entrer votre nouveau mot de passe ci-dessous') ?></h3>

<form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="change" value="<?php echo __('Changer') ?>" /></td></tr></tfoot>
  </table>
</form>