<?php
class config
{
	private static $_instance;
	private $_configs;
	private function __construct(){
  		$this->_configs=Doctrine_Core::getTable('Configuration')->findAll();
	}
	private function __clone(){}

	public function get($key)
	{
		foreach($this->_configs as $config)
			if($config->getName()==$key)
			{
				if($config->getType()==1)
					return $config->isActivated();
				else
					return $config->getValue();
			}
		throw new ConfigNotFoundException();
	}
	public static function getInstance(){
		if(!(self::$_instance instanceof self))
			self::$_instance = new self();
		return self::$_instance;
	}
}