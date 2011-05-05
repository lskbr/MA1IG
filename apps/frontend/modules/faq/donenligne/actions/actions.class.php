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
        $email = $_GET['ipn_email'];
        $header = "";
        $emailtext = "";
// Read the post from PayPal and add 'cmd'
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exits = true;
        }
//        $item_name = $_POST['item_name'];
//        $item_number = $_POST['item_number'];
//        $payment_status = $_POST['payment_status'];
//        $payment_amount = $_POST['mc_gross'];
//        $payment_currency = $_POST['mc_currency'];
//        $txn_id = $_POST['txn_id'];
//        $receiver_email = $_POST['receiver_email'];
//        $payer_email = $_POST['payer_email'];
//        $id_user = $_POST['custom'];
        foreach ($_POST as $key => $value) {
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



//            $payment = new Payment();
//            $payment->setMontant($payment_amount);
//            $payment->save();
// TODO:
// Check the payment_status is Completed
// Check that txn_id has not been previously processed
// Check that receiver_email is your Primary PayPal email
// Check that payment_amount/payment_currency are correct
// Process payment
// If 'VERIFIED', send an email of IPN variables and values to the
// specified email address
                    foreach ($_POST as $key => $value) {
                        $emailtext .= $key . " = " . $value . "\n\n";
                    }
                    mail('laurent_cardon@hotmail.com', "Live-VERIFIED IPN", $emailtext . "\n\n" . $req);
                } else if (strcmp($res, "INVALID") == 0) {
// If 'INVALID', send an email. TODO: Log for manual investigation.
                    foreach ($_POST as $key => $value) {
                        $emailtext .= $key . " = " . $value . "\n\n";
                    }
                    mail('laurent_cardon@hotmail.com', "Live-INVALID IPN", $emailtext . "\n\n" . $req . "\n\n" . $res);
                }
            }
            fclose($fp);
        }
    }

}
