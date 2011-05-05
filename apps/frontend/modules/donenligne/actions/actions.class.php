<?php

/**
 * donenligne actions.
 *
 * @package    grainedevie
 * @subpackage donenligne
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class donenligneActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

    }

    public function executeIPNListener(sfWebRequest $request) {
        error_reporting(E_ALL ^ E_NOTICE);
        $postData = $request->getPostParameters();
        $header = "";
        $emailtext = "";
// Read the post from PayPal and add 'cmd'
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exits = true;
        }
        $montantTotal = $request->getPostParameter('mc_gross');
        $comission = $request->getPostParameter('mc_fee');
        $mailAcheteur = $request->getPostParameter('payer_email');
        $rue = $request->getPostParameter('address_street');
        $datePayement = $request->getPostParameter('payment_date');
        $firstName = $request->getPostParameter('first_name');
        $lastName = $request->getPostParameter('last_name');
        $pays = $request->getPostParameter('address_country');
        $ville = $request->getPostParameter('address_city');
        $codePostal = $request->getPostParameter('address_zip');
        $paymentStatus = $request->getPostParameter('payment_status');
        $receiverEmail = $request->getPostParameter('receiver_email');
        $txnId = $request->getPostParameter('txn_id');
        foreach ($postData as $key => $value) {
// Handle escape characters, which depends on setting of magic quotes
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
// Post back to PayPal to validate
        $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
// Process validation from PayPal
// TODO: This sample does not test the HTTP response code. All
// HTTP response codes must be handles or you should use an HTTP
// library, such as cUrl
        if (!$fp) { // HTTP ERROR
        } else {
// NO HTTP ERROR
            fputs($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets($fp, 1024);
                /* La transaction est valide */
                if (strcmp($res, "VERIFIED") == 0) {
                    // vérifier que payment_status a la valeur Completed
                    if ($paymentStatus == "Completed") {
                        // Cette transaction a-t-elle déjà été traitée ?
                        if (paymentTable::getInstance()->findBy('paypal_id', $txnId)->count() == 0) {
                            // vérifier que receiver_email est votre adresse email PayPal principale
                            if ("lauren_1304357296_biz@hotmail.com" == $receiverEmail) {
                                $payment = new Payment();
                                $payment->setBrutAmout($montantTotal);
                                $payment->setFee($comission);
                                $payment->setDate($datePayement);
                                $payment->setPaypalId($txnId);
                                $acheteur = $acheteur = PersonTable::getInstance()->findOneBy('email_address', $mailAcheteur);
                                if (!$acheteur) {
                                    $acheteur = new Person();
                                    $acheteur->setFirstName($firstName);
                                    $acheteur->setLastName($lastName);
                                    $acheteur->setEmailAddress($mailAcheteur);
                                    $acheteur->save();
                                }
                                $adresse = AddressTable::getInstance()->findOneBy('person_id', $acheteur->getId());
                                if (!$adresse) {
                                    $adresse = new Address();
                                    $adresse->setStreet($rue);
                                    $adresse->setCountry($pays);
                                    $adresse->setCity($ville);
                                    $adresse->setZipCode($codePostal);
                                    $adresse->setPerson($acheteur);
                                    $adresse->save();
                                }
                                $payment->setPerson($acheteur);
                                $payment->save();
                            } else {
                                // Mauvaise adresse email paypal
                            }
                        } else {
                            // ID de transaction déjà utilisé
                        }
                    } else {
                        // Statut de paiement: Echec
                    }
                } else if (strcmp($res, "INVALID") == 0) {
                }
            }
            fclose($fp);
        }

    }

}
