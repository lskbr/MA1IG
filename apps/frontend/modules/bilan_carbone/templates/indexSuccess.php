<?php $page_title = __('Calculez votre empreinte écologique !'); ?>

<?php slot('title', $page_title); ?>

<h1><?php echo $page_title ?></h1>

<div style="margin: 10px 0 10px 0;">
    <?php echo __('Ce questionnaire se base sur des <b>chiffres annuels</b> et tous les champs sont requis.<br/>
    Il est simplifié de manière à ne vous prendre que quelques minutes pour y répondre.<br/>
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

<div id="bilan_carbone">
    <form method="post" action="<?php echo url_for('bilan_carbone/index') ?>">
        <fieldset>
            <legend><h3><?php echo __('Logement') ?></h3></legend>
            <h4>&#149; <?php echo $form['nbr_people']->renderLabel('Combien de personnes vivent dans votre logement ?', array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['nbr_people']->render(array('value' => '1', 'size' => '3')).' '.__('personne(s)').$form['nbr_people']->renderError(); ?></div>
            <h4>&#149; <?php echo __('Que consommez-vous comme combustible ?') ?></h4>
            <div>
                <?php echo $form['gas']->renderLabel('Gaz').' : '.$form['gas']->render(array('value' => '0', 'size' => '6')).' '.__('litre(s)').$form['gas']->renderError(); ?><br/>
                <?php echo $form['fuel']->renderLabel('Fuel').' : '.$form['fuel']->render(array('value' => '0', 'size' => '6')).' '.__('litre(s)').$form['fuel']->renderError(); ?><br/>
                <?php echo $form['wood']->renderLabel('Bois').' : '.$form['wood']->render(array('value' => '0', 'size' => '6')).' '.__('kg').$form['wood']->renderError(); ?>
            </div>
            <h4>&#149; <?php echo $form['elec']->renderLabel('Que consommez-vous en électricité ?', array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['elec']->render(array('value' => '0', 'size' => '6')).' '.__('kWh').$form['elec']->renderError(); ?></div>

        </fieldset>
        <fieldset>
            <legend><h3><?php echo __('Transport') ?></h3></legend>
            <h4>&#149; <?php echo __('Véhicule 1 (voiture, moto,...)') ?></h4>
            <div>
                <?php echo $form['km1']->renderLabel('Nombre de kilomètres parcourus').' : '.$form['km1']->render(array('value' => '0', 'size' => '6')).' '.__('km').$form['km1']->renderError(); ?><br/>
                <?php echo $form['co21']->renderLabel('Emission de CO<sub>2</sub> par kilomètre').' : '.$form['co21']->render(array('value' => '0', 'size' => '3')).' '.__('g/km').$form['co21']->renderError(); ?><br/>
            </div>
            <h4>&#149; <?php echo __('Véhicule 2 (voiture, moto,...)') ?></h4>
            <div>
                <?php echo $form['km2']->renderLabel('Nombre de kilomètres parcourus').' : '.$form['km2']->render(array('value' => '0', 'size' => '6')).' '.__('km').$form['km2']->renderError(); ?><br/>
                <?php echo $form['co22']->renderLabel('Emission de CO<sub>2</sub> par kilomètre').' : '.$form['co22']->render(array('value' => '0', 'size' => '3')).' '.__('g/km').$form['co22']->renderError(); ?><br/>
            </div>
            <h4>&#149; <?php echo __('Avion') ?></h4>
            <div>
                <?php echo $form['nbr_plane']->renderLabel('Nombre de trajets').' : '.$form['nbr_plane']->render(array('value' => '0', 'size' => '3')).$form['nbr_plane']->renderError(); ?><br/>
                <?php echo $form['km_plane']->renderLabel('Distance totale parcourue').' : '.$form['km_plane']->render(array('value' => '0', 'size' => '6')).' '.__('km').$form['km_plane']->renderError(); ?><br/>
            </div>
            <h4>&#149; <?php echo __('Transports en commun') ?></h4>
            <div>
                <?php echo $form['train']->renderLabel('Distance parcourue en moyenne par mois en train').' : '.$form['train']->render(array('value' => '0', 'size' => '6')).' '.__('km').$form['train']->renderError(); ?><br/>
                <?php echo $form['bus']->renderLabel('Temps passé en moyenne par semaine dans des transports en commun de proximité non propulsés à l\'électricité (ex.: bus)').' : '.$form['bus']->render(array('value' => '0', 'size' => '6')).' '.__('minute(s)').$form['bus']->renderError(); ?><br/>
                <?php echo $form['metro']->renderLabel('Temps passé en moyenne par semaine dans des transports en commun de proximité propulsés à l\'électricité (ex.: métro)').' : '.$form['metro']->render(array('value' => '0', 'size' => '6')).' '.__('minute(s)').$form['metro']->renderError(); ?><br/>
            </div>
        </fieldset>
        <fieldset>
            <legend><h3><?php echo __('Consommation') ?></h3></legend>
            <h4>&#149; <?php echo $form['computers']->renderLabel('Quel est en moyenne votre budget annuel en achats d\'ordinateurs (unités centrales, écrans, ordinateurs portables) et de télévisions ?', array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['computers']->render(array('value' => '0', 'size' => '6')).' '.__('euros').$form['computers']->renderError(); ?></div>
            <h4>&#149; <?php echo $form['books']->renderLabel('Quel est en moyenne votre budget mensuel en petits consommables tels que : papeterie, livres, petits produits manufacturés, ustensiles de cuisine, produits de soin,... ?', array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['books']->render(array('value' => '0', 'size' => '6')).' '.__('euros').$form['books']->renderError(); ?></div>
            <h4>&#149; <?php echo $form['pets']->renderLabel('Si vous avez des animaux domestiques (chien, chat,...), à combien estimez-vous la quantité de viande rouge qu\'ils consomment par mois ?', array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['pets']->render(array('value' => '0', 'size' => '6')).' '.__('kg').$form['pets']->renderError(); ?></div>
            <h4>&#149; <?php echo $form['yacht']->renderLabel('Si vous avez un ou plusieurs bateau(x), mobile-home(s) ou caravane(s), qui ont été produits il y a moins de dix ans, quel est le poids approximatif de tous ces éléments réunis ?', array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['yacht']->render(array('value' => '0', 'size' => '6')).' '.__('tonnes').$form['yacht']->renderError(); ?></div>
        </fieldset>
        <div id="submit_carbone">
            <input type="submit" value="Calculer" />
        </div>
    </form>
</div>