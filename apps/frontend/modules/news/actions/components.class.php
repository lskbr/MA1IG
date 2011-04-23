<?php

class newsComponents extends sfComponents
{
  public function executeNews(sfWebRequest $request)
  {
    $this->news = Doctrine_Core::getTable('News')->getLast(config::getInstance()->get('news_by_page'));
  }
}
?>