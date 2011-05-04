<?php

/**
 * Basepayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property float $brut_amout
 * @property float $fee
 * @property string $date
 * @property string $paypal_id
 * @property integer $person_id
 * @property Person $Person
 * 
 * @method float   getBrutAmout()  Returns the current record's "brut_amout" value
 * @method float   getFee()        Returns the current record's "fee" value
 * @method string  getDate()       Returns the current record's "date" value
 * @method string  getPaypalId()   Returns the current record's "paypal_id" value
 * @method integer getPersonId()   Returns the current record's "person_id" value
 * @method Person  getPerson()     Returns the current record's "Person" value
 * @method payment setBrutAmout()  Sets the current record's "brut_amout" value
 * @method payment setFee()        Sets the current record's "fee" value
 * @method payment setDate()       Sets the current record's "date" value
 * @method payment setPaypalId()   Sets the current record's "paypal_id" value
 * @method payment setPersonId()   Sets the current record's "person_id" value
 * @method payment setPerson()     Sets the current record's "Person" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class Basepayment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('payment');
        $this->hasColumn('brut_amout', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('fee', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('date', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('paypal_id', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('person_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Person', array(
             'local' => 'person_id',
             'foreign' => 'id'));
    }
}