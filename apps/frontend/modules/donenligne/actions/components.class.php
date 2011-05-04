<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class donenligneComponents extends sfComponents{
    public function  executeShow($request) {
        if($request->getParameter('montant')){
            $this->montant = $request->getParameter('montant');
        }else{
            $this->montant = Config::getInstance()->get('donenligne_amount');
        }
        
    }
}

?>
