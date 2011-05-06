<?php

class BasesfGuardRegisterActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
            $this->redirect('@homepage');
        }

        $this->form = new sfGuardRegisterForm();

        if ($request->isMethod('post')) {
            $sse = $request->getParameter($this->form->getName());
            if (Doctrine_Query::create()->from('sfGuardUser')->where('person.email_address = ?', $sse['Person']['email_address'])->andWhere('sfGuardUser.person_id = person.id')->count() == 1) {
                $existedeja = false;
            } else {
                $existedeja = true;
            }
            $this->form->bind($sse,null,$existedeja);
            if ($this->form->isValid()) {
                if ($existedeja) {

                    $person = Doctrine_Query::create()->from('Person')->where('email_address = ?', $sse['Person']['email_address'])->fetchOne();
                    $person->setLastName($sse['Person']['last_name']);
                    $person->setFirstName($sse['Person']['first_name']);
                    $person->save();
                    $user = $this->form->save();
                    $user->setPerson($person);
                    $user->save();
                } else {
                    $user = $this->form->save();
                }


                $this->getUser()->signIn($user);

                $this->redirect('@homepage');
            }
        }
    }

}