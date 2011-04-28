<?php slot('title', __('Bilan Carbone')); ?>

<h1><?php echo __('Bilan Carbone') ?></h1>

<div style="margin: 10px 0 10px 0;">
    <?php echo __('Ce questionnaire est simplifié de manière à ne prendre que quelques minutes pour y répondre.<br/>
    Vous pourrez trouver des questionnaires plus complets et plus précis sur les sites suivants :<br/>
    <a href="http://www.calculateurcarbone.org/" target="_blank">Bilan Carbone® Personnel</a>') ?>
</div>

<form method="POST" action="<?php echo url_for('contact/submit') ?>">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>