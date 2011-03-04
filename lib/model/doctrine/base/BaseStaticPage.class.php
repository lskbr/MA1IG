<?php

/**
 * BaseStaticPage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $content
 * @property boolean $is_activated
 * @property string $title
 * 
 * @method text       getContent()      Returns the current record's "content" value
 * @method boolean    getIsActivated()  Returns the current record's "is_activated" value
 * @method string     getTitle()        Returns the current record's "title" value
 * @method StaticPage setContent()      Sets the current record's "content" value
 * @method StaticPage setIsActivated()  Sets the current record's "is_activated" value
 * @method StaticPage setTitle()        Sets the current record's "title" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseStaticPage extends Page
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('static_page');
        $this->hasColumn('content', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('is_activated', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'En contruction',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}