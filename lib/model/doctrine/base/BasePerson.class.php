<?php

/**
 * BasePerson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property Doctrine_Collection $sfGuardUser
 * 
 * @method string              getFirstName()     Returns the current record's "first_name" value
 * @method string              getLastName()      Returns the current record's "last_name" value
 * @method string              getEmailAddress()  Returns the current record's "email_address" value
 * @method Doctrine_Collection getSfGuardUser()   Returns the current record's "sfGuardUser" collection
 * @method Person              setFirstName()     Sets the current record's "first_name" value
 * @method Person              setLastName()      Sets the current record's "last_name" value
 * @method Person              setEmailAddress()  Sets the current record's "email_address" value
 * @method Person              setSfGuardUser()   Sets the current record's "sfGuardUser" collection
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
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUser', array(
             'local' => 'id',
             'foreign' => 'user_id'));
    }
}