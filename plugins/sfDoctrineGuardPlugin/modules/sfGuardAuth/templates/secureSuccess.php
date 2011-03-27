<?php use_helper('I18N') ?>

<h2><?php echo __("Vous n'avez pas les autorisations sufisantes pour accèder à cette page") ?></h2>

<p><?php echo sfContext::getInstance()->getRequest()->getUri() ?></p>

<h3><?php echo __('Veuillez vous reconnecter avant de continuer votre navigation') ?></h3>

<?php echo get_component('sfGuardAuth', 'signin_form') ?>