<?php

/**
 * StaticPageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StaticPageTable extends PageTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object StaticPageTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('StaticPage');
    }
}