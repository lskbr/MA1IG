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
                'nbr_people' => new sfWidgetFormInputText(array(), array('size' => '3')),
                'nat_gas' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'prop_gas' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'fuel' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'wood' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'elec' => new sfWidgetFormInputText(array(), array('size' => '6')),

                'km1' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'co21' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'km2' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'co22' => new sfWidgetFormInputText(array(), array('size' => '6')),
                
                'km_plane'=> new sfWidgetFormInputText(array(), array('size' => '6')),
                'train' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'bus' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'metro' => new sfWidgetFormInputText(array(), array('size' => '6')),
            
                'computers' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'books' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'pets' => new sfWidgetFormInputText(array(), array('size' => '6')),
                'yacht' => new sfWidgetFormInputText(array(), array('size' => '6')),
        ));

        $this->setValidators(array(
                'nbr_people' => new sfValidatorInteger(array('required' => true, 'trim' => true, 'min' => 1)),
                'fuel' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'nat_gas' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'prop_gas' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'wood' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'elec' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),

                'km1' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'co21' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'km2' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'co22' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),

                'km_plane' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'train' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'bus' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'metro' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                
                'computers' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'books' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'pets' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'yacht' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
        ));

        $this->setDefaults(array(
                'nbr_people' => 1,
                'nat_gas' => 0,
                'prop_gas' => 0,
                'fuel' => 0,
                'wood' => 0,

                'km1' => 0,
                'co21' => 0,
                'km2' => 0,
                'co22' => 0,

                'km_plane'=> 0,
                'train' => 0,
                'bus' => 0,
                'metro' => 0,

                'computers' => 0,
                'books' => 0,
                'pets' => 0,
                'yacht' => 0,
        ));

        $this->widgetSchema->setNameFormat('bilan_carbone[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }
}