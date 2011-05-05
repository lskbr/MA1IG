<?php
//        mail('laurent_cardon@hotmail.com', 'Testing 01', 'Bonjour');
//        $montantTotal = $request->getPostParameter('mc_gross');
//        $comission = $request->getPostParameter('mc_fee');
//        mail('laurent_cardon@hotmail.com', 'Testing 02', 'Bonjour');
//        $mailAcheteur = $request->getPostParameter('payer_email');
//        $rue = $request->getPostParameter('address_street');
//        $datePayement = $request->getPostParameter('payment_date');
//        $firstName = $request->getPostParameter('first_name');
//        mail('laurent_cardon@hotmail.com', 'Testing 03', 'Bonjour');
//        $lastName = $request->getPostParameter('last_name');
//        $pays = $request->getPostParameter('address_country');
//        $ville = $request->getPostParameter('address_city');
//        $codePostal = $request->getPostParameter('address_zip');
//        mail('laurent_cardon@hotmail.com', 'Testing 04', 'Bonjour');

//                    mail('laurent_cardon@hotmail.com', 'Testing 1', 'Bonjour');
//                    $payment = new Payment();
//                    $payment->setBrutAmout($montantTotal);
//                    $payment->setFee($comission);
//                    $payment->setDate($datePayement);
//                    mail('laurent_cardon@hotmail.com', 'Testing 2', 'Bonjour');
//                    $acheteur = PersonTable::getInstance()->findBySql('email_address = ? AND last_name = ? AND first_name = ?', array($mailAcheteur, $lastName, $firstName));
//                    if (!$acheteur) {
//                        $acheteur = new Person();
//                        $acheteur->setFirstName($firstName);
//                        $acheteur->setLastName($lastName);
//                        $acheteur->setEmailAddress($mailAcheteur);
//                        $acheteur->save();
//                    }
//                    mail('laurent_cardon@hotmail.com', 'Testing 3', 'Bonjour');
//                    $adresse = addressTable::getInstance()->findBySql('street = ? AND country = ? AND city = ? AND zip_code = ?', array($rue, $pays, $ville, $codePostal));
//                    if (!$adresse) {
//                        $adresse = new Address();
//                        $adresse->setStreet($rue);
//                        $adresse->setCountry($pays);
//                        $adresse->setCity($ville);
//                        $adresse->setZipCode($codePostal);
//                        $adresse->setPerson($acheteur);
//                        $adresse->save();
//                    }
//                    mail('laurent_cardon@hotmail.com', 'Testing 4', 'Bonjour');
//                    $payment->setPerson($acheteur);
//                    $payment->save();

?>
