<?php

/**
 * Person form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonForm extends BasePersonForm {

    public function configure() {
        $this->widgetSchema->setLabels(array(
            'first_name' => 'Prénom',
            'last_name' => 'Nom de famille',
            'email_address' => 'Adresse Email'
        ));

        $this->validatorSchema['email_address'] = new sfValidatorAnd(array(
            $this->validatorSchema['email_address'],
            new sfValidatorEmail()
        ));

        $this->useFields(array(
            'first_name', 'last_name', 'email_address'
        ));
    }

}
