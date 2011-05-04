<?php

/**
 * Baseaddress
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $street
 * @property string $country
 * @property string $city
 * @property string $zip_code
 * @property integer $person_id
 * @property Person $Person
 * 
 * @method string  getStreet()    Returns the current record's "street" value
 * @method string  getCountry()   Returns the current record's "country" value
 * @method string  getCity()      Returns the current record's "city" value
 * @method string  getZipCode()   Returns the current record's "zip_code" value
 * @method integer getPersonId()  Returns the current record's "person_id" value
 * @method Person  getPerson()    Returns the current record's "Person" value
 * @method address setStreet()    Sets the current record's "street" value
 * @method address setCountry()   Sets the current record's "country" value
 * @method address setCity()      Sets the current record's "city" value
 * @method address setZipCode()   Sets the current record's "zip_code" value
 * @method address setPersonId()  Sets the current record's "person_id" value
 * @method address setPerson()    Sets the current record's "Person" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class Baseaddress extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('address');
        $this->hasColumn('street', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('country', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('city', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('zip_code', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 10,
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