<?php

/**
 * Subscriber
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Subscriber extends BaseSubscriber
{
	public function save(Doctrine_Connection $conn = null)
	{
		$this->setHash(md5(uniqid().$this->getEmail()));
		return parent::save($conn);
	}
}