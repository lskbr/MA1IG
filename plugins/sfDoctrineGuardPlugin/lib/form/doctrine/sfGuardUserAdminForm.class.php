<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {

      $this->widgetSchema->setLabels(array(
          'first_name' => 'Prénom',
          'last_name' => 'Nom de famille'
          ));

      $this->validatorSchema['email_address'] = new sfValidatorAnd(array(
          $this->validatorSchema['email_address'],
          new sfValidatorEmail()
      ));
  }
}
