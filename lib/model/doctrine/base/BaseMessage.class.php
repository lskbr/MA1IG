<?php

/**
 * BaseMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $text
 * @property boolean $is_saved
 * @property datetime $read_at
 * @property datetime $created_at
 * @property datetime $reply_at
 * @property integer $comment_id
 * @property integer $sender_id
 * @property integer $category_id
 * @property integer $folder_id
 * @property integer $forward_to_id
 * @property Comment $comment
 * @property Person $Person
 * @property FaqCategory $faqCategory
 * @property Folder $Folder
 * 
 * @method text        getText()          Returns the current record's "text" value
 * @method boolean     getIsSaved()       Returns the current record's "is_saved" value
 * @method datetime    getReadAt()        Returns the current record's "read_at" value
 * @method datetime    getCreatedAt()     Returns the current record's "created_at" value
 * @method datetime    getReplyAt()       Returns the current record's "reply_at" value
 * @method integer     getCommentId()     Returns the current record's "comment_id" value
 * @method integer     getSenderId()      Returns the current record's "sender_id" value
 * @method integer     getCategoryId()    Returns the current record's "category_id" value
 * @method integer     getFolderId()      Returns the current record's "folder_id" value
 * @method integer     getForwardToId()   Returns the current record's "forward_to_id" value
 * @method Comment     getComment()       Returns the current record's "comment" value
 * @method Person      getPerson()        Returns the current record's "Person" value
 * @method FaqCategory getFaqCategory()   Returns the current record's "faqCategory" value
 * @method Folder      getFolder()        Returns the current record's "Folder" value
 * @method Message     setText()          Sets the current record's "text" value
 * @method Message     setIsSaved()       Sets the current record's "is_saved" value
 * @method Message     setReadAt()        Sets the current record's "read_at" value
 * @method Message     setCreatedAt()     Sets the current record's "created_at" value
 * @method Message     setReplyAt()       Sets the current record's "reply_at" value
 * @method Message     setCommentId()     Sets the current record's "comment_id" value
 * @method Message     setSenderId()      Sets the current record's "sender_id" value
 * @method Message     setCategoryId()    Sets the current record's "category_id" value
 * @method Message     setFolderId()      Sets the current record's "folder_id" value
 * @method Message     setForwardToId()   Sets the current record's "forward_to_id" value
 * @method Message     setComment()       Sets the current record's "comment" value
 * @method Message     setPerson()        Sets the current record's "Person" value
 * @method Message     setFaqCategory()   Sets the current record's "faqCategory" value
 * @method Message     setFolder()        Sets the current record's "Folder" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('message');
        $this->hasColumn('text', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('is_saved', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('read_at', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('created_at', 'datetime', null, array(
             'type' => 'datetime',
             'notnull' => true,
             ));
        $this->hasColumn('reply_at', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('comment_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('sender_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('folder_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('forward_to_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Comment as comment', array(
             'local' => 'comment_id',
             'foreign' => 'id'));

        $this->hasOne('Person', array(
             'local' => 'forward_to_id',
             'foreign' => 'id'));

        $this->hasOne('FaqCategory as faqCategory', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('Folder', array(
             'local' => 'folder_id',
             'foreign' => 'id'));
    }
}