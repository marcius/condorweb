<?php

/**
 * This is the model class for table "causali".
 *
 * The followings are the available columns in table 'causali':
 * @property string $id_causale
 * @property string $descrizione
 * @property integer $segno
 * @property string $tipo
 *
 * The followings are the available model relations:
 */
class Causale extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Causale the static model class
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
		return 'causali';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_causale, descrizione', 'required'),
			array('segno', 'numerical', 'integerOnly'=>true),
			array('id_causale, tipo', 'length', 'max'=>5),
			array('descrizione', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_causale, descrizione, segno, tipo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'transazioni' => array(self::HAS_MANY, 'Transazione', 'id_causale'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_causale' => 'Causale',
			'descrizione' => 'Descrizione',
			'segno' => 'Segno',
			'tipo' => 'Tipo',
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

		$criteria->compare('id_causale',$this->id_causale,true);
		$criteria->compare('descrizione',$this->descrizione,true);
		$criteria->compare('segno',$this->segno);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}