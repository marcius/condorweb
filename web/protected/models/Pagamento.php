<?php

/**
 * This is the model class for table "pagamenti".
 *
 * The followings are the available columns in table 'pagamenti':
 * @property string $id_transazione
 * @property string $anno_competenza
 * @property string $id_cassa
 * @property string $importo
 * @property string $data_pagam
 * @property string $des_pagam
 * @property string $id_pagamento
 *
 * The followings are the available model relations:
 */
class Pagamento extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Pagamento the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pagamenti';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_transazione, importo, id_cassa, data_pagam', 'required'),
            array('id_transazione, importo', 'length', 'max' => 10),
            array('id_cassa', 'length', 'max' => 5),
            array('des_pagam', 'length', 'max' => 20),
            array('id_pagamento', 'length', 'max' => 11),
            array('data_pagam', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_transazione, id_cassa, importo, data_pagam, des_pagam, id_pagamento', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'transazione' => array(self::BELONGS_TO, 'Transazione', 'id_transazione'),
            'cassa' => array(self::BELONGS_TO, 'Cassa', 'id_cassa'),

        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_transazione' => 'Id Transazione',
            'anno_competenza' => 'Anno Competenza',
            'id_cassa' => 'Id Cassa',
            'importo' => 'Importo',
            'data_pagam' => 'Data Pagam',
            'des_pagam' => 'Des Pagam',
            'id_pagamento' => 'Id Pagamento',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_transazione', $this->id_transazione, true);
        $criteria->compare('anno_competenza', $this->anno_competenza, true);
        $criteria->compare('id_cassa', $this->id_cassa, true);
        $criteria->compare('importo', $this->importo, true);
        $criteria->compare('data_pagam', $this->data_pagam, true);
        $criteria->compare('des_pagam', $this->des_pagam, true);
        $criteria->compare('id_pagamento', $this->id_pagamento, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    public static function searchQuotePerAnno($year) {

        $criteria = new CDbCriteria;
        $criteria->with = array('transazione');
        $criteria->compare('transazione.id_causale', "q", false);
        $criteria->compare('year(t.data_pagam)', $year, false);
        $criteria->order = "t.data_pagam";
        return new CActiveDataProvider('Pagamento', array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

    public static function searchPerAnno($year) {

        $criteria = new CDbCriteria;
        $criteria->with = array('transazione');
        $criteria->compare('year(t.data_pagam)', $year, false);
        $criteria->order = "t.data_pagam";
        return new CActiveDataProvider('Pagamento', array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }
    public static function searchPerPeriodo($data_da, $data_a) {

        $criteria = new CDbCriteria;
        $criteria->with = array('transazione');
        $criteria->compare('t.data_pagam', '>='.$data_da, false);
        $criteria->compare('t.data_pagam', '<='.$data_a, false);
        $criteria->order = "t.data_pagam";
        return new CActiveDataProvider('Pagamento', array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }
}