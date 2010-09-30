<?php

/**
 * This is the model class for table "casse".
 *
 * The followings are the available columns in table 'casse':
 * @property string $id_cassa
 * @property string $descrizione
 *
 * The followings are the available model relations:
 */
class Cassa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cassa the static model class
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
		return 'casse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cassa, descrizione', 'required'),
			array('id_cassa', 'length', 'max'=>5),
			array('descrizione', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cassa, descrizione', 'safe', 'on'=>'search'),
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
			'transazioni' => array(self::HAS_MANY, 'Transazione', 'id_cassa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cassa' => 'Id Cassa',
			'descrizione' => 'Descrizione',
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

		$criteria->compare('id_cassa',$this->id_cassa,true);
		$criteria->compare('descrizione',$this->descrizione,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}