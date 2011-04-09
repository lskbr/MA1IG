<?php

/**
 * BasePage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $menu_title
 * @property integer $position
 * @property timestamp $publication_date
 * @property integer $category_id
 * @property Category $Category
 * 
 * @method string    getMenuTitle()        Returns the current record's "menu_title" value
 * @method integer   getPosition()         Returns the current record's "position" value
 * @method timestamp getPublicationDate()  Returns the current record's "publication_date" value
 * @method integer   getCategoryId()       Returns the current record's "category_id" value
 * @method Category  getCategory()         Returns the current record's "Category" value
 * @method Page      setMenuTitle()        Sets the current record's "menu_title" value
 * @method Page      setPosition()         Sets the current record's "position" value
 * @method Page      setPublicationDate()  Sets the current record's "publication_date" value
 * @method Page      setCategoryId()       Sets the current record's "category_id" value
 * @method Page      setCategory()         Sets the current record's "Category" value
 * 
 * @package    grainedevie
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BasePage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('page');
        $this->hasColumn('menu_title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('position', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('publication_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'menu_title',
              1 => 'content',
              2 => 'is_activated',
              3 => 'title',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}