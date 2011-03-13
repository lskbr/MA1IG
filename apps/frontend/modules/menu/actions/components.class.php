<?php

class menuComponents extends sfComponents
{
  public function executeMenu(sfWebRequest $request)
  {
    $this->categories = Doctrine_Core::getTable('Category')->getActiveCategories();
  }
}
?>
