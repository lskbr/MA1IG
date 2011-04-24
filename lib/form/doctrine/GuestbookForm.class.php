<?php

/**
 * Guestbook form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GuestbookForm extends BaseGuestbookForm
{
  public function configure()
  {
  	unset($this['created_at'],$this['updated_at'],$this['is_validated']);
  	$this->setWidget('content',new sfWidgetFormTextarea(array(), array('size' => '20x5')));
  	$this->widgetSchema->setLabels(array(
            'language_id' => 'Langue :',
            'content' => 'Message :'
        ));
  }
}
