<?php

/**
 * bilan_carbone actions.
 *
 * @package    grainedevie
 * @subpackage bilan_carbone
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bilan_carboneActions extends sfActions {
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->form = new BilanCarboneForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('bilan_carbone'));
            if ($this->form->isValid()) {
                /* Calcul de l'empreinte écologique */
                $eco_footprint = '#empreinte écologique#';
                $nbr_trees = '#nombre d\'arbres#';

                /* Enregistrement de l'empreinte écologique dans une variable de session pour la garder en mémoire si on change de page */
                $this->getUser()->setAttribute('eco_footprint', $eco_footprint);
                $this->getUser()->setAttribute('nbr_trees', $nbr_trees);

                $this->getUser()->getAttributeHolder()->remove('eco_footprint');
                $this->getUser()->getAttributeHolder()->remove('nbr_trees');

                $this->redirect('bilan_carbone/calcul'); //?'.http_build_query($this->form->getValues()));
            }
            else
                $this->bilan_error = true;
        }
        else
            $this->bilan_error = false;
    }

    public function executeCalcul(sfWebRequest $request) {
        //$this->bilan = $this->getRoute()->getObject();

        //$params = $this->bilan->getRequestParameter('nbr_people');

        $this->mlsdkhrg = array(
            'nbr_people' => $request->getParameter('nbr_people'),
        );
    }
}
