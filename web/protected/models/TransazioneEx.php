<?php

/**
 * This is the model class for table "transazioniex".
 *
 * The followings are the available columns in table 'transazioniex':
 * @property string $rowtype
 * @property string $anno_registrazione
 * @property string $tipo_transazione
 * @property string $id_causale
 * @property string $id_cassa
 * @property integer $id_controparte
 * @property string $descrizione
 * @property string $importo
 * @property string $data_doc
 * @property string $riferim_doc
 * @property string $data_pagam
 * @property string $des_pagam
 *
 * The followings are the available model relations:
 */
class TransazioneEx extends CActiveRecord {
    const PRINCIPIO_CASSA=0;
    const PRINCIPIO_COMPETENZA=1;

    public $principio;

    public function scopes() {
        return array(
            'pr_cassa' => array(
                'condition' => '(rowtype="D" and year(data_pagam)=' . $this->anno_registrazione .')'
                . ' or (rowtype="T-CASSA" and anno_competenza =' . $this->anno_registrazione .')',
            ),
            'pr_comp' => array(
                'condition' => '(rowtype="D" and anno_registrazione=' . $this->anno_registrazione .')'
                . ' or (rowtype="T-COMP" and anno_competenza =' . $this->anno_registrazione .')',
            ),
        );
    }

        
    /**
     * Returns the static model of the specified AR class.
     * @return TransazioneEx the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'transazioniex';
    }

    public function primaryKey() {
        return 'id';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_controparte', 'numerical', 'integerOnly' => true),
            array('rowtype', 'length', 'max' => 1),
            array('anno_registrazione', 'length', 'max' => 4),
            array('tipo_transazione, id_causale, id_cassa', 'length', 'max' => 5),
            array('descrizione', 'length', 'max' => 100),
            array('importo', 'length', 'max' => 32),
            array('riferim_doc, des_pagam', 'length', 'max' => 20),
            array('data_doc, data_pagam', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('rowtype, anno_registrazione, tipo_transazione, id_causale, id_cassa, id_controparte, descrizione, importo, data_doc, riferim_doc, data_pagam, des_pagam', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'causale' => array(self::BELONGS_TO, 'Causale', 'id_causale'),
            'controparte' => array(self::BELONGS_TO, 'Soggetto', 'id_controparte'),
            'cassa' => array(self::BELONGS_TO, 'Cassa', 'id_cassa'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'rowtype' => 'Rowtype',
            'anno_registrazione' => 'Anno Registrazione',
            'tipo_transazione' => 'Tipo Transazione',
            'id_causale' => 'Id Causale',
            'id_cassa' => 'Id Cassa',
            'id_controparte' => 'Id Controparte',
            'descrizione' => 'Descrizione',
            'importo' => 'Importo',
            'data_doc' => 'Data Doc',
            'riferim_doc' => 'Riferim Doc',
            'data_pagam' => 'Data Pagam',
            'des_pagam' => 'Des Pagam',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function orig_search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('rowtype', $this->rowtype, true);
        $criteria->compare('anno_registrazione', $this->anno_registrazione, true);
        $criteria->compare('tipo_transazione', $this->tipo_transazione, true);
        $criteria->compare('id_causale', $this->id_causale, true);
        $criteria->compare('id_cassa', $this->id_cassa, true);
        $criteria->compare('id_controparte', $this->id_controparte);
        $criteria->compare('descrizione', $this->descrizione, true);
        $criteria->compare('importo', $this->importo, true);
        $criteria->compare('data_doc', $this->data_doc, true);
        $criteria->compare('riferim_doc', $this->riferim_doc, true);
        $criteria->compare('data_pagam', $this->data_pagam, true);
        $criteria->compare('des_pagam', $this->des_pagam, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = $this->getDbCriteria();

        // competenza
        //$criteria->compare('anno_registrazione', $this->anno_registrazione);
        // cassa
        //$criteria->compare('year(data_pagam)',$this->anno_registrazione);
        $criteria->compare('tipo_transazione', $this->tipo_transazione);
        //$criteria->order = 'anno_registrazione, tipo_transazione, id_causale, data_pagam, descrizione';
        $criteria->order = 'tipo_transazione, id_causale, data_pagam, descrizione';

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria, 'pagination' => false,
        ));
    }

}