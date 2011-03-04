<?php

/**
 * BaseLanguage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $abbreviation
 * @property string $flag
 * @property boolean $is_activated
 * @property boolean $is_default
 * @property Doctrine_Collection $Page
 * 
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getAbbreviation() Returns the current record's "abbreviation" value
 * @method string              getFlag()         Returns the current record's "flag" value
 * @method boolean             getIsActivated()  Returns the current record's "is_activated" value
 * @method boolean             getIsDefault()    Returns the current record's "is_default" value
 * @method Doctrine_Collection getPage()         Returns the current record's "Page" collection
 * @method Language            setName()         Sets the current record's "name" value
 * @method Language            setAbbreviation() Sets the current record's "abbreviation" value
 * @method Language            setFlag()         Sets the current record's "flag" value
 * @method Language            setIsActivated()  Sets the current record's "is_activated" value
 * @method Language            setIsDefault()    Sets the current record's "is_default" value
 * @method Language            setPage()         Sets the current record's "Page" collection
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseLanguage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('language');
        $this->hasColumn('name', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 40,
             ));
        $this->hasColumn('abbreviation', 'string', 5, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 5,
             ));
        $this->hasColumn('flag', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_activated', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_default', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'unique' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Page', array(
             'local' => 'id',
             'foreign' => 'language_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}