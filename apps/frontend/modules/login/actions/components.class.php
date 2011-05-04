<?php

class loginComponents extends sfComponents
{
  public function executeLogin(sfWebRequest $request)
  {
    $this->authenticated = $this->getUser()->isAuthenticated();
  }
}
?>