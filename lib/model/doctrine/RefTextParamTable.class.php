<?php

/**
 * RefTextParamTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RefTextParamTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object RefTextParamTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('RefTextParam');
    }
	
	public static function getTextParams()
	{
		return RefTextParamTable::getInstance()->createQuery('a')->
			select("a.id, CONCAT(a.x, ':', a.y, ':', a.width, ':', a.font_size, ':', a.color) AS params")->
			leftJoin('a.RefImageParam b')->execute();
	}
}