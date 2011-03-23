<?php use_helper('I18N') ?>

<form class="module-form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <input id="login-button"  type="submit" value="<?php echo __('Connexion') ?>" />
                    <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Mot de passe oublié ?') ?></a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
