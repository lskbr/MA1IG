<?php

/**
 * BilanCarbone form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 */
class BilanCarboneForm extends BaseForm {
    public function configure() {
        $this->setWidgets(array(
                'nbr_people' => new sfWidgetFormInputText(),
                'gas'   => new sfWidgetFormInputText(),
                'fuel' => new sfWidgetFormInputText(),
                'wood' => new sfWidgetFormInputText(),
                'elec' => new sfWidgetFormInputText(),

                'km1' => new sfWidgetFormInputText(),
                'co21'   => new sfWidgetFormInputText(),
                'km1' => new sfWidgetFormInputText(),
                'co22' => new sfWidgetFormInputText(),
                'cntplane' => new sfWidgetFormInputText(),
                'kmplane'=> new sfWidgetFormInputText(),
                'train'   => new sfWidgetFormInputText(),
                'bus' => new sfWidgetFormInputText(),
                'metro' => new sfWidgetFormInputText(),
            
                'computers' => new sfWidgetFormInputText(),
                'books' => new sfWidgetFormInputText(),
                'pets'    => new sfWidgetFormInputText(),
                'yacht' => new sfWidgetFormInputText(),

        ));

        $this->widgetSchema->setLabels(array(
                'nbr_people' => 'Combien de personnes vivent dans ce logement?',
                'gas'   => 'Gaz (litres)',
                'fuel' => 'Fuel (litres)',
                'wood' => 'Bois (kg)',
                'elec' => 'Consommation d\'électricité? (kWh)',

                'km1' => 'Nombre de kilomètres',
                'co21' => 'Emission de CO2 par kilomètre (g/km)',
                'km1' => 'Nombre de kilomètres',
                'co22' => 'Emission de CO2 par kilomètre (g/km)',
                'cntplane' => 'Nombre de trajets ',
                'kmplane' => 'Nombre de kilomètres total parcouru',
                'train' => 'Quelle distance parcourez-vous en moyenne par mois en train ?',
                'bus' => 'Combien de temps (en minutes) passez-vous en moyenne par semaine dans des transports en commun de proximité non propulsés à l\'Electricité ?',
                'metro' => 'Combien de temps (en minutes) passez-vous en moyenne par semaine dans des transports en commun de proximité propulsés à l\'Electricité ? ',

                'computers' => 'Quel est en moyenne votre budget annuel en achats d\'ordinateurs (unités centrales, écrans, ordinateurs portables), de télévisions et en petit matériel technologique (informatique et électronique)  (en euros) ? ',
                'books' => 'Quel est en moyenne votre budget mensuel en petits consommables tels que : papeterie, livres, petits produits manufacturés, ustensiles de cuisine, produits de soin ... ? ',
                'pets' => 'Si vous avez des animaux domestiques (chien, chat, ...), à combien estimez-vous la quantité de viande rouge qu\'ils consomment par mois (en kilogrammes) ? ',
                'yacht' => 'Si vous avez un ou plusieurs bateau(x), mobil-home(s) ou caravane(s), qui ont été produits il y a moins de dix ans, quel est le poids approximatif (en tonnes) de tous ces éléments réunis ?',


        ));

        $this->setValidators(array(
                'nbr_people' => new sfValidatorInteger(array('required' => true, 'min' => 1)),
                'gas'   => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'fuel' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'wood' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'elec' => new sfValidatorNumber(array('required' => true, 'min' => 0)),

                'km1' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'co21' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'km1' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'co22' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'cntplane' => new sfValidatorInteger(array('required' => true, 'min' => 0)),
                'kmplane' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'train' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'bus' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'metro' => new sfValidatorNumber(array('required' => true, 'min' => 0)),

                'computers' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'books' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'pets' => new sfValidatorNumber(array('required' => true, 'min' => 0)),
                'yacht' => new sfValidatorNumber(array('required' => true, 'min' => 0)),

        ));

        $this->widgetSchema->setNameFormat('bilan_carbone[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        //$this->widgetSchema->setFormFormatterName('list');
    }
}