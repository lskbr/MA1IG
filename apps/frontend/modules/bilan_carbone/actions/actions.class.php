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
                $bilan = array(
                    'nbr_people' => $request->getParameter('nbr_people'),
                    'fuel' => $request->getParameter('fuel'),
                    'gas' => $request->getParameter('gas'),
                    'wood' => $request->getParameter('wood'),
                    'elec' => $request->getParameter('elec'),

                    'km1' => $request->getParameter('km1'),
                    'co21' => $request->getParameter('co21'),
                    'km2' => $request->getParameter('km2'),
                    'co22' => $request->getParameter('co22'),

                    'nbr_plane' => $request->getParameter('nbr_plane'),
                    'km_plane' => $request->getParameter('km_plane'),
                    'train' => $request->getParameter('train'),
                    'bus' => $request->getParameter('bus'),
                    'metro' => $request->getParameter('metro'),

                    'computers' => $request->getParameter('computers'),
                    'books' => $request->getParameter('books'),
                    'pets' => $request->getParameter('pets'),
                    'yacht' => $request->getParameter('yacht'),
                );
                
                /* Calcul de l'empreinte écologique */
                $eco_footprint = '#empreinte écologique#';
                $nbr_trees = '#nombre d\'arbres#';

                /* Enregistrement de l'empreinte écologique dans une variable de session pour la garder en mémoire si on change de page */
                $this->getUser()->setAttribute('eco_footprint', $eco_footprint);
                $this->getUser()->setAttribute('nbr_trees', $nbr_trees);

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
        
    }
}
