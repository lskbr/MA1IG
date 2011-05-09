<?php

/**
 * BaseCounter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property timestamp $initial_date
 * @property integer $initial_number
 * @property integer $period
 * @property integer $objective_number
 * @property string $slogan
 * @property Slogan $Slogan
 * 
 * @method timestamp getInitialDate()      Returns the current record's "initial_date" value
 * @method integer   getInitialNumber()    Returns the current record's "initial_number" value
 * @method integer   getPeriod()           Returns the current record's "period" value
 * @method integer   getObjectiveNumber()  Returns the current record's "objective_number" value
 * @method string    getSlogan()           Returns the current record's "slogan" value
 * @method Slogan    getSlogan()           Returns the current record's "Slogan" value
 * @method Counter   setInitialDate()      Sets the current record's "initial_date" value
 * @method Counter   setInitialNumber()    Sets the current record's "initial_number" value
 * @method Counter   setPeriod()           Sets the current record's "period" value
 * @method Counter   setObjectiveNumber()  Sets the current record's "objective_number" value
 * @method Counter   setSlogan()           Sets the current record's "slogan" value
 * @method Counter   setSlogan()           Sets the current record's "Slogan" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseCounter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('counter');
        $this->hasColumn('initial_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('initial_number', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('period', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('objective_number', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('slogan', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Slogan', array(
             'local' => 'slogan',
             'foreign' => 'name',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));
    }
}