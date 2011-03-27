<?php use_helper('I18N') ?>

<form class="module-form" action="<?php echo url_for('@sf_guard_register') ?>" method="post">
  <table>
    <?php echo $form ?>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" name="register" value="<?php echo __("S'inscrire") ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
