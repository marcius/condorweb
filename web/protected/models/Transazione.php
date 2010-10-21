<?php

/**
 * This is the model class for table "transazioni".
 *
 * The followings are the available columns in table 'transazioni':
 * @property string $id_transazione
 * @property string $tipo_transazione
 * @property string $anno_registrazione
 * @property string $anno_competenza
 * @property string $id_causale
 * @property string $id_cassa
 * @property integer $id_controparte
 * @property string $controparte
 * @property string $descrizione
 * @property string $importo
 * @property string $data_doc
 * @property string $riferim_doc
 * @property string $data_pagam
 * @property string $des_pagam
 *
 * The followings are the available model relations:
 */
class Transazione extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Transazione the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transazioni';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_transazione, anno_registrazione, anno_competenza, descrizione, importo, id_cassa', 'required'),
			array('id_controparte', 'numerical', 'integerOnly'=>true),
			array('tipo_transazione, id_causale, id_cassa', 'length', 'max'=>5),
			array('anno_registrazione, anno_competenza, importo', 'length', 'max'=>10),
			array('descrizione', 'length', 'max'=>100),
			array('riferim_doc, des_pagam', 'length', 'max'=>20),
			array('data_doc, data_pagam', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_transazione, tipo_transazione, anno_registrazione, anno_competenza, id_causale, id_cassa, id_controparte, controparte, cassa, causale, descrizione, importo, data_doc, riferim_doc, data_pagam, des_pagam', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'causale' => array(self::BELONGS_TO, 'Causale', 'id_causale'),
			'controparte' => array(self::BELONGS_TO, 'Soggetto', 'id_controparte'),
			'cassa' => array(self::BELONGS_TO, 'Cassa', 'id_cassa'),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_transazione' => 'ID',
			'tipo_transazione' => 'Tipo',
			'anno_registrazione' => 'Anno Registrazione',
			'anno_competenza' => 'Anno Competenza',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                $criteria->with = array('cassa', 'causale', 'controparte');
		$criteria->compare('id_transazione',$this->id_transazione,true);
		$criteria->compare('tipo_transazione',$this->tipo_transazione,true);
		$criteria->compare('anno_registrazione',$this->anno_registrazione,true);
		$criteria->compare('anno_competenza',$this->anno_competenza,true);
		//$criteria->compare('id_causale',$this->id_causale,true);
		$criteria->compare('causale.id_causale',$this->causale);
		//$criteria->compare('id_controparte',$this->id_controparte);
		$criteria->compare('controparte.id_controparte',$this->controparte);
		$criteria->compare('descrizione',$this->descrizione,true);
		$criteria->compare('importo',$this->importo,true);
		//$criteria->compare('id_cassa',$this->id_cassa,true);
		$criteria->compare('cassa.id_cassa',$this->cassa);
		$criteria->compare('data_doc',$this->data_doc,true);
		$criteria->compare('riferim_doc',$this->riferim_doc,true);
		$criteria->compare('data_pagam',$this->data_pagam,true);
		$criteria->compare('des_pagam',$this->des_pagam,true);

		$dataProvider = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
                //$dataProvider=$x->search();
                $dataProvider->pagination = false; //->pageSize=9999;
                return $dataProvider;

	}
}