<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfGuardUserComponents extends sfComponents{

    public function executeAdministrator(sfWebRequest $request){
        $this->users = Doctrine::getTable('sfGuardUser')->createQuery()->leftJoin('sfGuardUser.sfGuardUserGroup p')->where('p.group_id = ?','1')->leftJoin('sfGuardUser.Person')->execute();
    }

}

?>
