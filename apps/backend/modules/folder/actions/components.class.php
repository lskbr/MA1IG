<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class folderComponents extends sfComponents{

    public function executeFolder(sfWebRequest $request){
        $this->folders = Doctrine::getTable('folder')->findAll();
    }

}

?>
