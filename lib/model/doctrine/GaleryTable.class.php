<?php

/**
 * GaleryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GaleryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object GaleryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Galery');
    }

    public function getActiveGallery() { //author : Laurent
        $query = $this->createQuery('a')->where('a.is_activated = ?', true)->orderBy('a.position ASC');
        return $query->execute();
    }

    public function retrieveBackendGalleries(Doctrine_Query $query)
    {
        $rootAlias = $query->getRootAlias();
        $query->leftJoin($rootAlias . '.Translation');
        return $query;
    }
}