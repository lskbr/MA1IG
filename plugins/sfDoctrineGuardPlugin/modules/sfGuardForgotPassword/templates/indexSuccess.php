<?php use_helper('I18N') ?>
<h2><?php echo __('Oublié votre mot de passe ?') ?></h2>

<p>
  <?php echo __('Veuillez completer le formulaire ci-dessous pour le récupérer de manière sécurisée') ?>
</p>

<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="change" value="<?php echo __('Envoyer') ?>" /></td></tr></tfoot>
  </table>
</form>