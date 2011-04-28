<?php

/**
 * BasePerson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property integer $corespondance_id
 * @property Corespondance $Corespondance
 * @property sfGuardUser $Person
 * @property Doctrine_Collection $forwardTo
 * 
 * @method string              getFirstName()        Returns the current record's "first_name" value
 * @method string              getLastName()         Returns the current record's "last_name" value
 * @method string              getEmailAddress()     Returns the current record's "email_address" value
 * @method integer             getCorespondanceId()  Returns the current record's "corespondance_id" value
 * @method Corespondance       getCorespondance()    Returns the current record's "Corespondance" value
 * @method sfGuardUser         getPerson()           Returns the current record's "Person" value
 * @method Doctrine_Collection getForwardTo()        Returns the current record's "forwardTo" collection
 * @method Person              setFirstName()        Sets the current record's "first_name" value
 * @method Person              setLastName()         Sets the current record's "last_name" value
 * @method Person              setEmailAddress()     Sets the current record's "email_address" value
 * @method Person              setCorespondanceId()  Sets the current record's "corespondance_id" value
 * @method Person              setCorespondance()    Sets the current record's "Corespondance" value
 * @method Person              setPerson()           Sets the current record's "Person" value
 * @method Person              setForwardTo()        Sets the current record's "forwardTo" collection
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BasePerson extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('person');
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('corespondance_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Corespondance', array(
             'local' => 'corespondance_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as Person', array(
             'local' => 'id',
             'foreign' => 'person_id'));

        $this->hasMany('Message as forwardTo', array(
             'local' => 'id',
             'foreign' => 'forward_to_id'));
    }
}