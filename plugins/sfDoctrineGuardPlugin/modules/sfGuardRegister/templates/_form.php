<?php use_helper('I18N') ?>

<form class="module-form" action="<?php echo url_for('@sf_guard_register') ?>" method="post">
    <table>
        <tr>
            <th><?php echo $form['username']->renderLabel() ?></th>
            <td><?php echo $form['username']->render() ?></td>
            <td><?php echo $form['username']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['password']->renderLabel() ?></th>
            <td><?php echo $form['password']->render() ?></td>
            <td><?php echo $form['password']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['password_again']->renderLabel() ?></th>
            <td><?php echo $form['password_again']->render() ?></td>
            <td><?php echo $form['password_again']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['Person'];?></th>
        <tfoot>
            <tr>
                <td colspan="3">
                    <?php echo $form['Person']->renderHiddenFields(false); echo $form->renderHiddenFields(false); ?>
                    <input type="submit" name="register" value="<?php echo __("S'inscrire") ?>" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>
