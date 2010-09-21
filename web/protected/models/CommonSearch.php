<?php

class CommonSearch extends CFormModel
{
    public $anno;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('anno', 'numerical'),
            //array('amount_min, amount_max', 'length', 'max'=>10),
            //array('description', 'length', 'max'=>100),
            //array('counterparty', 'length', 'max'=>50),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'anno'=>'Anno',
            //'expected_payer_subject_id'=>'Expected payer',
            //'actual_payer_subject_id'=>'Actual payer',
            //'recipient_subject_id'=>'Recipient',
        );
    }

}
?>
