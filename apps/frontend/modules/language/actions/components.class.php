<?php
class languageComponents extends sfComponents
{
  public function executeLanguage(sfWebRequest $request)
  {
    $this->culture=$this->getUser()->getCulture();
  	$this->languages=Doctrine_Query::create()->from('Language l')->where("is_activated = ?",true)->execute();
  	$lang_abb=array();
    foreach($this->languages as $lang)
    	$lang_abb[]=$lang->getAbbreviation();
    $this->form = new sfFormLanguage(
      $this->getUser(),
      array('languages' => $lang_abb)
    );
  }
}