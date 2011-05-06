<?php

/**
 * BaseNewsletter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $news_id
 * @property integer $subscriber_count
 * @property News $News
 * 
 * @method integer    getNewsId()           Returns the current record's "news_id" value
 * @method integer    getSubscriberCount()  Returns the current record's "subscriber_count" value
 * @method News       getNews()             Returns the current record's "News" value
 * @method Newsletter setNewsId()           Sets the current record's "news_id" value
 * @method Newsletter setSubscriberCount()  Sets the current record's "subscriber_count" value
 * @method Newsletter setNews()             Sets the current record's "News" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseNewsletter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('newsletter');
        $this->hasColumn('news_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('subscriber_count', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('News', array(
             'local' => 'news_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}