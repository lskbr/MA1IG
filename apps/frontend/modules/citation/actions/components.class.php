<?php

class citationComponents extends sfComponents
{
  public function executeCitation(sfWebRequest $request)
  {
    $this->citation = Doctrine_Core::getTable('Citation')->getOneRandom($this->getUser()->getCulture());
  }
}
?>