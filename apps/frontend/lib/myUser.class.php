<?php

class myUser extends sfGuardSecurityUser {

    /*
     * Contactez Laurent pour plus d'info
     */
    public function getPerson() {
        return $this->getGuardUser()->getPerson();
    }

}
