<?php

/**
 * Guestbook
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Guestbook extends BaseGuestbook
{
	public function enable()
	{
		$this->setIsValidated(true);
		$this->save();
	}
	public function disable()
	{
		$this->setIsValidated(false);
		$this->save();
	}
}