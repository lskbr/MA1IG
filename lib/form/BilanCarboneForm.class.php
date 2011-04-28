<?php

/**
 * BilanCarbone form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 */
class BilanCarboneForm extends BaseForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'nbr_people' => new sfWidgetFormInputText(),
            'gas'   => new sfWidgetFormInputText(),
            'fuel' => new sfWidgetFormInputText(),
            'wood' => new sfWidgetFormInputText(),
            'elec' => new sfWidgetFormInputText(),
        ));

        $this->widgetSchema->setLabels(array(
          'nbr_people'    => 'Combien de personnes vivent dans ce logement?',
          'gas'   => 'Gaz (litres)',
          'fuel' => 'Fuel (litres)',
          'wood' => 'Bois (kg)',
          'elec' => 'Consommation d\'électricité? (kWh)',
        ));
        
        //$this->widgetSchema->setFormFormatterName('list');
        
    }
}