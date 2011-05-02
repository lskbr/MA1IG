<?php slot('title', __('Bilan Carbone')); ?>

<h1><?php echo __('Bilan Carbone') ?></h1>

<div style="margin: 10px 0 10px 0;">
    <?php echo __('Ce questionnaire est simplifié de manière à ne prendre que quelques minutes pour y répondre.<br/>
    Vous pourrez trouver des questionnaires plus complets et plus précis sur les sites suivants :<br/>
    <a href="http://www.calculateurcarbone.org/" target="_blank">Bilan Carbone® Personnel</a>') ?>
</div>

<!--
<form method="post" action="<?php echo url_for('bilan_carbone/index') ?>">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>
-->

<?php
function bubble_error($msg) {
    return '
<div class="jquerybubblepopup jquerybubblepopup-orange" style="font-size: 11px;">
    <table>
        <tbody>
            <tr>
                <td class="jquerybubblepopup-top-left" style="background-image:url(/images/bulle/top-left.png);"></td>
                <td class="jquerybubblepopup-top-middle" style="background-image: url(/images/bulle/top-middle.png); text-align: left;"></td>
                <td class="jquerybubblepopup-top-right" style="background-image:url(/images/bulle/top-right.png);"></td>
            </tr>
            <tr>
                <td class="jquerybubblepopup-middle-left" style="background-image:url(/images/bulle/middle-left.png);">
                    <img class="jquerybubblepopup-tail" alt="" src="/images/bulle/tail-left.png"/>
                </td>
                <td class="jquerybubblepopup-innerHtml" style="color:#000;text-align:left;font-size:12px;">
                    '.$msg.'
                </td>
                <td class="jquerybubblepopup-middle-right" style="background-image:url(/images/bulle/middle-right.png);"></td>
            </tr>
            <tr>
                <td class="jquerybubblepopup-bottom-left" style="background-image:url(/images/bulle/bottom-left.png);"></td>
                <td class="jquerybubblepopup-bottom-middle" style="background-image:url(/images/bulle/bottom-middle.png);"></td>
                <td class="jquerybubblepopup-bottom-right" style="background-image:url(/images/bulle/bottom-right.png);"></td>
            </tr>
        </tbody>
    </table>
</div>';
}
?>


<form method="post" action="<?php echo url_for('bilan_carbone/index') ?>">
        <fieldset style="border: 1px #b5ac8f solid;">
            <legend style="margin: 10px; padding: 2px; border: 1px #b5ac8f solid; border-radius: 5px;">Logement</legend>
            <table>
                <tr>
                    <th><?php echo $form['nbr_people']->renderLabel(); ?></th>
                    <td><?php echo $form['nbr_people']; ?></td>
                    <td><?php echo $form['nbr_people']->renderError() ?></td>
                </tr>
                <tr>
                    <th>Subject:</th>
                    <td colspan="3"><?php echo $form['wood']->render() ?></td>
                </tr>
                <tr>
                    <th>Message:</th>
                    <td colspan="3"><?php echo $form['km1']->render() ?></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" />
                    </td>
                </tr>
            </table>
        </fieldset>
</form>