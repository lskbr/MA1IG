<?php

/**
 * BasePartner
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $company_name
 * @property string $logo
 * @property string $description
 * @property string $site
 * @property boolean $is_visible
 * @property integer $position
 * @property integer $visit_count
 * 
 * @method string  getCompanyName()  Returns the current record's "company_name" value
 * @method string  getLogo()         Returns the current record's "logo" value
 * @method string  getDescription()  Returns the current record's "description" value
 * @method string  getSite()         Returns the current record's "site" value
 * @method boolean getIsVisible()    Returns the current record's "is_visible" value
 * @method integer getPosition()     Returns the current record's "position" value
 * @method integer getVisitCount()   Returns the current record's "visit_count" value
 * @method Partner setCompanyName()  Sets the current record's "company_name" value
 * @method Partner setLogo()         Sets the current record's "logo" value
 * @method Partner setDescription()  Sets the current record's "description" value
 * @method Partner setSite()         Sets the current record's "site" value
 * @method Partner setIsVisible()    Sets the current record's "is_visible" value
 * @method Partner setPosition()     Sets the current record's "position" value
 * @method Partner setVisitCount()   Sets the current record's "visit_count" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BasePartner extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('partner');
        $this->hasColumn('company_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('logo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('site', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_visible', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('position', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('visit_count', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'company_name',
              1 => 'description',
              2 => 'site',
              3 => 'is_visible',
             ),
             ));
        $this->actAs($i18n0);
    }
}