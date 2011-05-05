<?php

/**
 * Message form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Laurent
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MessageForm extends BaseMessageForm {

    public function __construct($object = null, $options = array(), $CSRFSecret = null, $embed = null) {
        /*
         * Contacter Laurent pour plus d'info
         * var $option permet de définir si oui ou non il faut afficher la relation 'Sender'
         * true = On affiche le embedRelation('Sender')
         * false = Il n'y a pas de formulaire lié
         */
        parent::__construct($object, $options, $CSRFSecret);

        if (isset($embed) && $embed) {
            $this->embedRelation('Sender');
            $this->useFields(array('Sender', 'category_id', 'text'));
        } else {
            $this->useFields(array('category_id', 'text'));
        }
    }

    public function configure() {

        $this->setWidget('text', new sfWidgetFormTextarea());
        $this->setValidator('text', new sfValidatorString(array('min_length' => '10')));
    }



}
