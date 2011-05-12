<?php
use_helper('Number');

$page_title = __('Calculez votre empreinte écologique !');
slot('title', $page_title);
?>

<h1><?php echo $page_title ?></h1>

<div id="bilan_text">
    <?php echo __('Ce questionnaire se base sur des <b>chiffres annuels</b> et tous les champs sont requis.<br/>
    Il est simplifié de manière à ne vous prendre que quelques minutes pour y répondre.<br/>
    Vous pourrez trouver des questionnaires plus complets et plus précis sur les sites suivants :<br/>
    <a href="http://www.calculateurcarbone.org/" target="_blank">Bilan Carbone® Personnel</a>') ?>
</div>

<?php
if ($bilan_error):
?>
<div id="bilan_error">
    Certaines informations n'ont pas été saisies correctement dans le questionnaire
</div>
<?php
endif;
?>

<div id="bilan_carbone">
    <form method="post" action="<?php echo url_for('bilan_carbone/index') ?>">
        <?php echo $form->renderHiddenFields(false); ?>
        <fieldset>
            <legend><h3><?php echo __('Logement') ?></h3></legend>
            <h4>&#149; <?php echo $form['nbr_people']->renderLabel(__('Combien de personnes vivent dans votre logement ?'), array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['nbr_people']->render().' '.__('personne(s)').$form['nbr_people']->renderError(); ?></div>
            <h4>&#149; <?php echo __('Que consommez-vous comme combustible par an ?') ?></h4>
            <div>
                <?php echo $form['nat_gas']->renderLabel(__('Gaz naturel')).' : '.$form['nat_gas']->render().' '.__('m<sup>3</sup>').$form['nat_gas']->renderError(); ?><br/>
                <?php echo $form['prop_gas']->renderLabel(__('Gaz propane')).' : '.$form['prop_gas']->render().' '.__('kg').$form['prop_gas']->renderError(); ?><br/>
                <?php echo $form['fuel']->renderLabel(__('Fuel')).' : '.$form['fuel']->render().' '.__('litre(s)').$form['fuel']->renderError(); ?><br/>
                <?php echo $form['wood']->renderLabel(__('Bois')).' : '.$form['wood']->render().' '.__('kg').$form['wood']->renderError(); ?>
            </div>
            <h4>&#149; <?php echo $form['elec']->renderLabel(__('Que consommez-vous en électricité par an ?'), array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['elec']->render().' '.__('kWh').$form['elec']->renderError(); ?></div>

        </fieldset>
        <fieldset>
            <legend><h3><?php echo __('Transport') ?></h3></legend>
            <h4>&#149; <?php echo __('Véhicule 1 (voiture, moto,...)') ?></h4>
            <div>
                <?php echo $form['km1']->renderLabel(__('Nombre de kilomètres parcourus par an')).' : '.$form['km1']->render().' '.__('km').$form['km1']->renderError(); ?><br/>
                <?php echo $form['co21']->renderLabel(__('Emission de CO<sub>2</sub> par kilomètre')).' : '.$form['co21']->render().' '.__('g/km').$form['co21']->renderError(); ?><br/>
            </div>
            <h4>&#149; <?php echo __('Véhicule 2 (voiture, moto,...)') ?></h4>
            <div>
                <?php echo $form['km2']->renderLabel(__('Nombre de kilomètres parcourus par an')).' : '.$form['km2']->render().' '.__('km').$form['km2']->renderError(); ?><br/>
                <?php echo $form['co22']->renderLabel(__('Emission de CO<sub>2</sub> par kilomètre')).' : '.$form['co22']->render().' '.__('g/km').$form['co22']->renderError(); ?><br/>
            </div>
            <fieldset class="help">
                <legend><?php echo '<span class="help_text">'.__('Aide :').'</span> '.__('émission de CO<sub>2</sub>') ?></legend>
                <?php echo __('Une voiture moyenne de petite cylindrée : 160g CO<sub>2</sub>/km') ?><br/>
                <?php echo __('Une voiture neuve de petite cylindrée : 115g CO<sub>2</sub>/km') ?><br/>
                <?php echo __('Un 4x4 neuf : 190g CO<sub>2</sub>/km') ?><br/>
            </fieldset>
            <h4>&#149; <?php echo __('Avion') ?></h4>
            <div>
                <?php echo $form['km_plane']->renderLabel(__('Distance totale parcourue par an')).' : '.$form['km_plane']->render().' '.__('km').$form['km_plane']->renderError(); ?><br/>
            </div>
            <h4>&#149; <?php echo __('Transports en commun') ?></h4>
            <div>
                <?php echo $form['train']->renderLabel(__('Distance parcourue en moyenne par mois en train')).' : '.$form['train']->render().' '.__('km').$form['train']->renderError(); ?><br/>
                <?php echo $form['bus']->renderLabel(__('Temps passé en moyenne par semaine dans des transports en commun de proximité non propulsés à l\'électricité (ex.: bus)')).' : '.$form['bus']->render().' '.__('minute(s)').$form['bus']->renderError(); ?><br/>
                <?php echo $form['metro']->renderLabel(__('Temps passé en moyenne par semaine dans des transports en commun de proximité propulsés à l\'électricité (ex.: métro)')).' : '.$form['metro']->render().' '.__('minute(s)').$form['metro']->renderError(); ?><br/>
            </div>
        </fieldset>
        <fieldset>
            <legend><h3><?php echo __('Alimentation') ?></h3></legend>
            <div>
                <?php echo __('L\'alimentation d\'un Européen moyen produit <b>%number% kg équiv. CO<sub>2</sub></b> par an.<br/>Cette consommation varie d\'une personne à l\'autre mais pour simplifier ce questionnaire nous retiendrons la valeur moyenne.', array('%number%' => format_number(round($feed_coeff->get(0)->getCoeff(),2)))) ?>
            </div>
        </fieldset>
        <fieldset>
            <legend><h3><?php echo __('Consommation') ?></h3></legend>
            <h4>&#149; <?php echo $form['computers']->renderLabel(__('Quel est en moyenne votre budget annuel en achats d\'ordinateurs (unités centrales, écrans, ordinateurs portables) et de télévisions ?'), array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['computers']->render().' '.__('euros').$form['computers']->renderError(); ?></div>
            <h4>&#149; <?php echo $form['books']->renderLabel(__('Quel est en moyenne votre budget mensuel en petits consommables tels que : papeterie, livres, petits produits manufacturés, ustensiles de cuisine, produits de soin,... ?'), array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['books']->render().' '.__('euros').$form['books']->renderError(); ?></div>
            <h4>&#149; <?php echo $form['pets']->renderLabel(__('Si vous avez des animaux domestiques (chien, chat,...), à combien estimez-vous la quantité de viande rouge qu\'ils consomment par mois ?'), array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['pets']->render().' '.__('kg').$form['pets']->renderError(); ?></div>
            <h4>&#149; <?php echo $form['yacht']->renderLabel(__('Si vous avez un ou plusieurs bateau(x), mobile-home(s) ou caravane(s), qui ont été produits il y a moins de dix ans, quel est le poids approximatif de tous ces éléments réunis ?'), array('style' => 'font-weight: inherit;')) ?></h4>
            <div><?php echo $form['yacht']->render().' '.__('tonnes').$form['yacht']->renderError(); ?></div>
            <fieldset class="help">
                <legend><?php echo '<span class="help_text">'.__('Aide :').'</span> '.__('bateau(x), mobile-home(s) ou caravane(s)') ?></legend>
                <?php echo __('Vous devez diviser ce poids par le nombre de personnes (vous y compris) qui profitent de ces biens
                    (ce peut être par exemple le nombre de personnes de votre foyer),
                    afin que seule la part des émissions associées à votre consommation individuelle soit comptabilisée par le calculateur.<br/><br/>
                    Poids moyen d\'un voilier : environ 1,5 à 3,5 tonnes<br/>
                    Poids moyen d\'une caravane : environ 0,5 à 2 tonne(s)<br/>
                    Si vous ne disposez d\'aucun de ces biens, saisissez "0".') ?>
            </fieldset>
        </fieldset>
        <div id="submit_carbone">
            <input type="submit" value="<?php echo __('Calculer') ?>" />
        </div>
    </form>
</div>