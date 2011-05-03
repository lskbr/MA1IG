<?php

/*
 * Laurent.
 */

class MessageAdminForm extends BaseMessageForm {


    public function configure() {
        $this->embedRelation('comment');
        $this->useFields(array(
            'category_id','text','comment','is_saved'
        ));
        $this->setWidget('text', new sfWidgetFormTextarea());
        $this->setValidator('text', new sfValidatorString());
    }

}

?>
