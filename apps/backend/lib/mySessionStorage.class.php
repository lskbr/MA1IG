<?php
class mySessionStorage extends sfSessionStorage
{
  public function initialize($options = null)
  {
    $cookie = sfContext::getInstance()->getRequest()->getParameter('symfony');
    if ( $cookie != null ) 
    {
        $name = 'symfony';
        //preg_match('/^' . $name.'=(.*)$/', $cookie, $asMatch);
        //$value = $asMatch[1];
        $value = $cookie;
        session_name($name);
        session_id($value);
    }  
 
    parent::initialize($options);
  }
}