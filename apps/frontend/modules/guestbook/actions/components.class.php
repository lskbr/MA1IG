<?php

class guestbookComponents extends sfComponents
{
  public function executeGuestbook(sfWebRequest $request)
  {
    $this->guestbook = Doctrine_Core::getTable('Guestbook')->getOneRandom($this->getUser()->getCulture());;
  }
}
?>