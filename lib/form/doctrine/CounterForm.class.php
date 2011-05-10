<?php

/**
 * Counter form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CounterForm extends BaseCounterForm
{
	public function configure()
	{
		$this->widgetSchema['initial_date'] = new sfWidgetFormJQueryDate(array(
			'image'=>'/images/calendar.png',
			'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
			'culture' => 'fr'
		));

		// Simple date without jQuery date picker
 		//$this->widgetSchema["initial_date"] = new sfWidgetFormDate(array('format' => '%day%/%month%/%year%'));

 		$this->widgetSchema["slogan"] = new sfWidgetFormDoctrineChoice(array(
	 		'model' => $this->getRelatedModelName('Slogan'),
	 		'add_empty' => false,
	 		'table_method' => 'getSlogans'));
	 	
	 	$this->validatorSchema["slogan"] =  new sfValidatorDoctrineChoice(array(
		 	'model' => $this->getRelatedModelName('Slogan'),
		 	'column' => 'name',
		 	'required' => false));
	}
}
