<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class sentencesComponents extends sfComponents {

   public function executeSentence(sfWebRequest $request){
       $this->standardSentences = Doctrine_Core::getTable("StandardSentence")->findAll();
  }
}
