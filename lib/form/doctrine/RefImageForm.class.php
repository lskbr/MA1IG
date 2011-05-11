<?php

/**
 * RefImage form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RefImageForm extends BaseRefImageForm
{
	public function configure()
	{
		$this->widgetSchema['payment_id'] = new sfWidgetFormDoctrineChoice(array(
			'model' => 'RefImage',
			'add_empty' => true,
			'table_method' => 'getPersonsWithAmount'));
		
		$this->widgetSchema['lang_id'] = new sfWidgetFormDoctrineChoice(array(
			'model' => $this->getRelatedModelName('Language'),
			'add_empty' => false));
		
		$this->widgetSchema['param_id'] = new sfWidgetFormDoctrineChoice(array(
			'model' => $this->getRelatedModelName('RefImageParam'),
			'add_empty' => false));
	}
}
