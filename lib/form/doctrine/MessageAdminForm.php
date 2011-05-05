<?php

/*
 * Laurent.
 */

class MessageAdminForm extends BaseMessageForm {

    public function configure() {
        $this->embedRelation('comment');
        $this->useFields(array(
            'category_id', 'text', 'comment', 'is_saved'
        ));
        $this->setWidget('text', new sfWidgetFormTextarea());
        $this->setValidator('text', new sfValidatorString());
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null) {
        $taintedValues = $this->commentsTraitment($taintedValues);
        return parent::bind($taintedValues, $taintedFiles);
    }

    public function bindAndSave($taintedValues, $taintedFiles = null, $con = null) {
        $taintedValues = $this->commentsTraitment($taintedValues);
        parent::bindAndSave($taintedValues, $taintedFiles, $con);
    }


    private function commentsTraitment($taintedValues) {
        if ($taintedValues['comment']['text'] == '') {
            if (!$this->getValue('text')) {
                $taintedValues['comment']['text'] = null;
                $taintedValues['comment']['text'] = ' ';
            } else {
                $this->useFields(array('category_id', 'text', 'is_saved'));
                $temp = $taintedValues;
                $taintedValues = null;
                foreach ($temp as $key => $value) {
                    if ($key != 'comment') {
                        $taintedValues[$key] = $value;
                    }
                }
            }
        }
        return $taintedValues;
    }

}

?>
