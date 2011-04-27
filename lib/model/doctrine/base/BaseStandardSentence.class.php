<?php

/**
 * BaseStandardSentence
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $text
 * @property string $title
 * 
 * @method text             getText()  Returns the current record's "text" value
 * @method string           getTitle() Returns the current record's "title" value
 * @method StandardSentence setText()  Sets the current record's "text" value
 * @method StandardSentence setTitle() Sets the current record's "title" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseStandardSentence extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('standard_sentence');
        $this->hasColumn('text', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}