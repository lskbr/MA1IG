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
        if(!config::getInstance()->get('bilan_carbone'))
            $this->redirect404();

        $this->form = new BilanCarboneForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('bilan_carbone'));
            if ($this->form->isValid()) {
                $bilan = $request->getParameter('bilan_carbone');
                
                /* --- Calcul de l'empreinte écologique --- */
                /* Logement */
                $eco_footprint = ($bilan['nat_gas']*2300
                                  + $bilan['prop_gas']*2900
                                  + $bilan['fuel']*2860
                                  + $bilan['wood']*3
                                  + $bilan['elec']*372
                                 ) / $bilan['nbr_people'];
                /* Véhicules */
                $eco_footprint += ($bilan['km1']*$bilan['co21'] + $bilan['km2']*$bilan['co22']) /1000;
                /* Transports en commun */
                $eco_footprint += $bilan['km_plane']*140 + $bilan['train']*0.116 + $bilan['bus']*0.776+ $bilan['metro']*0.208;
                /* Alimentation */
                $eco_footprint += 2050.4;
                /* Consommation */
                $eco_footprint += $bilan['computers']*0.733 + $bilan['books']*4.40 + $bilan['pets']*208.729 + $bilan['yacht']*550;
                /* Nombre d'arbres à planter pour compenser */
                $nbr_trees = $eco_footprint/7.14; // 167;

                /* Enregistrement de l'empreinte écologique dans une variable de session pour la garder en mémoire si on change de page */
                $this->getUser()->setAttribute('eco_footprint', number_format($eco_footprint, 2, '.', ''));
                $this->getUser()->setAttribute('nbr_trees', number_format($nbr_trees, 0, '.', ''));

                //$this->getUser()->getAttributeHolder()->remove('eco_footprint');
                //$this->getUser()->getAttributeHolder()->remove('nbr_trees');

                $this->redirect('bilan_carbone/calcul'); //?'.http_build_query($this->form->getValues()));
            }
            else
                $this->bilan_error = true;
        }
        else
            $this->bilan_error = false;
    }

    public function executeCalcul(sfWebRequest $request) {
        if(!config::getInstance()->get('bilan_carbone'))
            $this->redirect404();
    }
}
