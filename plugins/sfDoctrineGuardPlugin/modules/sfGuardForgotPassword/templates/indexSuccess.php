<?php use_helper('I18N') ?>
<h1><?php echo __('Vous avez oublié votre mot de passe ?') ?></h1>

<p>
  <?php echo __('Veuillez completer le formulaire ci-dessous pour le récupérer de manière sécurisée') ?>
</p>

<form class="module-form" action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="change" value="<?php echo __('Envoyer') ?>" /></td></tr></tfoot>
  </table>
</form>
