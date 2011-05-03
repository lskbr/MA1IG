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
                'km2' => new sfWidgetFormInputText(),
                'co22' => new sfWidgetFormInputText(),
                
                'nbr_plane' => new sfWidgetFormInputText(),
                'km_plane'=> new sfWidgetFormInputText(),
                'train'   => new sfWidgetFormInputText(),
                'bus' => new sfWidgetFormInputText(),
                'metro' => new sfWidgetFormInputText(),
            
                'computers' => new sfWidgetFormInputText(),
                'books' => new sfWidgetFormInputText(),
                'pets'    => new sfWidgetFormInputText(),
                'yacht' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
                'nbr_people' => new sfValidatorInteger(array('required' => true, 'trim' => true, 'min' => 1)),
                'fuel' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'gas'   => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'wood' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'elec' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),

                'km1' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'co21' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'km2' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'co22' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),

                'nbr_plane' => new sfValidatorInteger(array('required' => true, 'trim' => true, 'min' => 0)),
                'km_plane' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'train' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'bus' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'metro' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                
                'computers' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'books' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'pets' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
                'yacht' => new sfValidatorNumber(array('required' => true, 'trim' => true, 'min' => 0)),
        ));

        $this->widgetSchema->setNameFormat('bilan_carbone[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }
}