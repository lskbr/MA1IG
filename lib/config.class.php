<?php
class config
{
	private static $_instance;
	private $_configs;
	private function __construct(){
  		$this->_configs=Doctrine_Core::getTable('Configuration')->findAll();
	}
	private function __clone(){}

	private function getConfig($key)
	{
		foreach($this->_configs as $config)
			if($config->getKey()==$key)
				return $config;
		throw new ConfigNotFoundException();
	}
	public function get($key)
	{
		if(($action=getConfig())->getType()==1)
			return $config->isActivated();
		else
			return $config->getValue();
	}
	public function forward404Unless($sfAction,$key)
	{
		if(($action=getAction())->getType()==1)
			$sfAction->forward404Unless(get($key));
		else
			throw new InvalidConfigTypeException();
	}
	public static function getInstance(){
		if(!(self::$_instance instanceof self))
			self::$_instance = new self();
		return self::$_instance;
	}
}