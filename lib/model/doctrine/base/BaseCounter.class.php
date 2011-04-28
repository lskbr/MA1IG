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
 * @property string $slogan_part1
 * @property string $slogan_part2
 * @property string $donation_text
 * 
 * @method timestamp getInitialDate()      Returns the current record's "initial_date" value
 * @method integer   getInitialNumber()    Returns the current record's "initial_number" value
 * @method integer   getPeriod()           Returns the current record's "period" value
 * @method integer   getObjectiveNumber()  Returns the current record's "objective_number" value
 * @method string    getSloganPart1()      Returns the current record's "slogan_part1" value
 * @method string    getSloganPart2()      Returns the current record's "slogan_part2" value
 * @method string    getDonationText()     Returns the current record's "donation_text" value
 * @method Counter   setInitialDate()      Sets the current record's "initial_date" value
 * @method Counter   setInitialNumber()    Sets the current record's "initial_number" value
 * @method Counter   setPeriod()           Sets the current record's "period" value
 * @method Counter   setObjectiveNumber()  Sets the current record's "objective_number" value
 * @method Counter   setSloganPart1()      Sets the current record's "slogan_part1" value
 * @method Counter   setSloganPart2()      Sets the current record's "slogan_part2" value
 * @method Counter   setDonationText()     Sets the current record's "donation_text" value
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
        $this->hasColumn('slogan_part1', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('slogan_part2', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('donation_text', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'slogan_part1',
              1 => 'slogan_part2',
              2 => 'donation_text',
             ),
             ));
        $this->actAs($i18n0);
    }
}