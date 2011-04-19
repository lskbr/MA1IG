<?php

/**
 * BaseConfiguration
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $main
 * @property string $name
 * @property text $description
 * @property integer $configuration_id
 * @property string $type
 * @property boolean $is_kernel
 * @property boolean $is_activated
 * @property string $value
 * @property BooleanConfiguration $BooleanConfiguration
 * 
 * @method string               getMain()                 Returns the current record's "main" value
 * @method string               getName()                 Returns the current record's "name" value
 * @method text                 getDescription()          Returns the current record's "description" value
 * @method integer              getConfigurationId()      Returns the current record's "configuration_id" value
 * @method string               getType()                 Returns the current record's "type" value
 * @method boolean              getIsKernel()             Returns the current record's "is_kernel" value
 * @method boolean              getIsActivated()          Returns the current record's "is_activated" value
 * @method string               getValue()                Returns the current record's "value" value
 * @method BooleanConfiguration getBooleanConfiguration() Returns the current record's "BooleanConfiguration" value
 * @method Configuration        setMain()                 Sets the current record's "main" value
 * @method Configuration        setName()                 Sets the current record's "name" value
 * @method Configuration        setDescription()          Sets the current record's "description" value
 * @method Configuration        setConfigurationId()      Sets the current record's "configuration_id" value
 * @method Configuration        setType()                 Sets the current record's "type" value
 * @method Configuration        setIsKernel()             Sets the current record's "is_kernel" value
 * @method Configuration        setIsActivated()          Sets the current record's "is_activated" value
 * @method Configuration        setValue()                Sets the current record's "value" value
 * @method Configuration        setBooleanConfiguration() Sets the current record's "BooleanConfiguration" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseConfiguration extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('configuration');
        $this->hasColumn('main', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('configuration_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_kernel', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('is_activated', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('value', 'string', 255, array(
             'type' => 'string',
             'default' => 0,
             'length' => 255,
             ));

        $this->setSubClasses(array(
             'BooleanConfiguration' => 
             array(
              'type' => 1,
             ),
             'NumericConfiguration' => 
             array(
              'type' => 2,
             ),
             'StringConfiguration' => 
             array(
              'type' => 3,
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('BooleanConfiguration', array(
             'local' => 'configuration_id',
             'foreign' => 'id'));
    }
}