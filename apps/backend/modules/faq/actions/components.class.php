<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class faqComponents extends sfComponents {

    public function executeGetQuestions(sfWebRequest $request) {
        $categoryId = MessageTable::getInstance()->findOneBy('id', $request->getParameter('id'))->getCategoryId();
        $this->questions = Doctrine::getTable('faq')->createQuery()->where('faq_category_id = ?', $categoryId)->execute();
    }

}

?>