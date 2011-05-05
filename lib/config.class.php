<?php
class config
{
	private static $_instance;
	private $_configs;
	private function __construct(){
  		$this->_configs = Doctrine_Core::getTable('Configuration')->findAll();
	}
	private function __clone(){}

	private function getConfig($key)
	{
		foreach($this->_configs as $config)
			if($config->getMain()==$key)
				return $config;
		echo $key;
		//throw new ConfigNotFoundException();
	}
	public function get($key)
	{
		$config=$this->getConfig($key);
		if($config->getType()==1)
			return $config->isActivated();
		else
			return $config->getValue();
	}
	public function forward404Unless($sfAction,$key)
	{
		$config=$this->getConfig($key);
		if($config->getType()==1)
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