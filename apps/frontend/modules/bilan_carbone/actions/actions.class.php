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

        $this->feed_coeff = Doctrine_Core::getTable('BilanCarboneCoeff')->createQuery('a')->where('name_short=?', 'feed')->execute();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('bilan_carbone'));
            if ($this->form->isValid()) {
                $bilan = $request->getParameter('bilan_carbone');
                
                /* --- Calcul de l'empreinte écologique --- */
                $bdd_coeffs = Doctrine_Core::getTable('BilanCarboneCoeff')->createQuery('a')->execute();

                $tab_coeff = array();
                foreach($bdd_coeffs as $bdd_coeff) {
                    $tab_coeff[$bdd_coeff->getNameShort()] = $bdd_coeff->getCoeff();
                }

                /* Logement */
                $eco_footprint = ($bilan['nat_gas'] * $tab_coeff['nat_gas']
                                  + $bilan['prop_gas']* $tab_coeff['prop_gas']
                                  + $bilan['fuel']* $tab_coeff['fuel']
                                  + $bilan['wood']* $tab_coeff['wood']
                                  + $bilan['elec']* $tab_coeff['elec']
                                 ) / $bilan['nbr_people'];
                /* Véhicules */
                $eco_footprint += ($bilan['km1']*$bilan['co21'] + $bilan['km2']*$bilan['co22']) /1000;
                /* Transports en commun */
                $eco_footprint += $bilan['km_plane'] *  $tab_coeff['km_plane']
                                  + $bilan['train'] *  $tab_coeff['train']
                                  + $bilan['bus'] * $tab_coeff['bus']
                                  + $bilan['metro'] * $tab_coeff['metro'];
                /* Alimentation */
                $eco_footprint += $tab_coeff['feed'];
                /* Consommation */
                $eco_footprint += $bilan['computers'] * $tab_coeff['computers']
                                  + $bilan['books'] * $tab_coeff['books']
                                  + $bilan['pets'] * $tab_coeff['pets']
                                  + $bilan['yacht'] * $tab_coeff['yacht'];
                /* Nombre d'arbres à planter pour compenser */
                $nbr_trees = $eco_footprint / $tab_coeff['tree_co2']; // 167;
                /* Montant du don */
                $montant_don = ceil($nbr_trees)* $tab_coeff['cost_tree'];

                /* Enregistrement de l'empreinte écologique dans une variable de session pour la garder en mémoire si on change de page */
                $this->getUser()->setAttribute('eco_footprint', $eco_footprint);
                $this->getUser()->setAttribute('nbr_trees', $nbr_trees);
                $this->getUser()->setAttribute('montant_don', $montant_don);

                //$this->getUser()->getAttributeHolder()->remove('eco_footprint');
                //$this->getUser()->getAttributeHolder()->remove('nbr_trees');
                //$this->getUser()->getAttributeHolder()->remove('montant_don');

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
        elseif($this->getUser()->getAttribute('eco_footprint') == '' || $this->getUser()->getAttribute('nbr_trees') == '' || $this->getUser()->getAttribute('feed_coeff') == '')
            $this->redirect('bilan_carbone');
            
    }
}
