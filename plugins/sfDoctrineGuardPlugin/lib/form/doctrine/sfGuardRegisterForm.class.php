<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm {

    /**
     * @see sfForm
     */
    public function configure() {
        $this->widgetSchema->setLabels(array(
            'username' => "Nom d'utilisateur",
            'password' => 'Mot de passe',
            'password_again' => 'Confirmation de votre mot de passe'
        ));

        $this->useFields(array(
            'username',
            'password',
            'password_again'
        ));

        $this->embedRelation('Person');
    }

}