<?php

/**
 * BaseFaqCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Message $Message
 * 
 * @method string      getName()    Returns the current record's "name" value
 * @method Message     getMessage() Returns the current record's "Message" value
 * @method FaqCategory setName()    Sets the current record's "name" value
 * @method FaqCategory setMessage() Sets the current record's "Message" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseFaqCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('faq_category');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Message', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($i18n0);
    }
}