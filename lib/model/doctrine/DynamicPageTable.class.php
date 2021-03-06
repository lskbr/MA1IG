<?php

/**
 * DynamicPageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DynamicPageTable extends PageTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object DynamicPageTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('DynamicPage');
    }

    public function getActivePages() {
        $query = $this->createQuery('a')->leftJoin('a.BooleanConfiguration b')->where('b.is_activated = ?',true);
        return $query->execute();
    }
}