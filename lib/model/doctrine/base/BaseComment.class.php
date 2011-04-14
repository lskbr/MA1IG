<?php

/**
 * BaseComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $text
 * @property date $update_at
 * @property Doctrine_Collection $Message
 * 
 * @method text                getText()      Returns the current record's "text" value
 * @method date                getUpdateAt()  Returns the current record's "update_at" value
 * @method Doctrine_Collection getMessage()   Returns the current record's "Message" collection
 * @method Comment             setText()      Sets the current record's "text" value
 * @method Comment             setUpdateAt()  Sets the current record's "update_at" value
 * @method Comment             setMessage()   Sets the current record's "Message" collection
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('comment');
        $this->hasColumn('text', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('update_at', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Message', array(
             'local' => 'id',
             'foreign' => 'comment_id'));
    }
}