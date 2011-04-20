<?php

/**
 * BaseComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $text
 * @property datetime $update_at
 * @property Message $Message
 * 
 * @method text     getText()      Returns the current record's "text" value
 * @method datetime getUpdateAt()  Returns the current record's "update_at" value
 * @method Message  getMessage()   Returns the current record's "Message" value
 * @method Comment  setText()      Sets the current record's "text" value
 * @method Comment  setUpdateAt()  Sets the current record's "update_at" value
 * @method Comment  setMessage()   Sets the current record's "Message" value
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
             ));
        $this->hasColumn('update_at', 'datetime', null, array(
             'type' => 'datetime',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Message', array(
             'local' => 'id',
             'foreign' => 'comment_id'));
    }
}