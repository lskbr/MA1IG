<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class donenligneComponents extends sfComponents{
    public function  executeShow($request) {
            $this->defaultMontant = Config::getInstance()->get('donenligne_amount');

    }
}

?>
