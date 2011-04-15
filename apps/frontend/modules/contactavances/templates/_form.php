<!--
    Réalisé par Laurent
-->

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('contactavances/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="<?php echo __('Enregistrer') ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
        <?php if(isset($mail) && isset($userName)): ?>
        <tr>
            <td>
                <?php echo __('Identitée :')?>
            </td>
            <td>
                <?php echo $userName; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo __('Répondre à :')?>
            </td>
            <td>
                <?php echo $mail; ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php echo $form ?>
    </tbody>
  </table>
</form>
