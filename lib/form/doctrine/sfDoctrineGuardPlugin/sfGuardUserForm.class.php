<?php

/**
 * sfGuardUser form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm {

    public function configure() {
        unset(
                $this['is_active'],
                $this['is_super_admin'],
                $this['updated_at'],
                $this['groups_list'],
                $this['permissions_list'],
                $this['last_login'],
                $this['created_at'],
                $this['salt'],
                $this['algorithm']
        );

        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password']->setOption('required', true);
        $this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];

        $this->widgetSchema->moveField('password_confirmation', 'after', 'password');

        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array(), array('invalid' => 'Veuillez entrer deux fois le même mot de passe'))); //Voir pour la traduction, le helper __() ne semble pas accepté ici même avec un use_helper()
    }

}
