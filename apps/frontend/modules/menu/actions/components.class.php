<?php

class menuComponents extends sfComponents
{
  public function executeMenu(sfWebRequest $request)
  {
    $this->categories = Doctrine_Core::getTable('Category')->getActiveCategories();
    $this->static_pages = Doctrine_Core::getTable('StaticPage')->getActivePages($this->getUser()->getCulture());
    $this->dynamic_pages = Doctrine_Core::getTable('DynamicPage')->getActivePages();
    $this->pages=array();
    foreach($this->categories as $c)
    	$this->pages[$c->getId()]=array();
    foreach($this->static_pages as $p)
    	$this->pages[$p->getCategoryId()][]=$p;
    foreach($this->dynamic_pages as $p)
    	$this->pages[$p->getCategoryId()][]=$p;
  }
}
?>