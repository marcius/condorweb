<?php

class Bilancio extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'bilanci':
	 * @var integer $anno
	 * @var string $voce
	 * @var string $valore
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return Bilancio the static model class
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
		return 'bilanci';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('anno, voce, valore', 'required'),
			array('anno', 'numerical', 'integerOnly'=>true),
			array('voce', 'length', 'max'=>50),
			array('valore', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('anno, voce, valore', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'anno' => 'Anno',
			'voce' => 'Voce',
			'valore' => 'Valore',
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

		$criteria->compare('anno',$this->anno);

		$criteria->compare('voce',$this->voce,true);

		$criteria->compare('valore',$this->valore,true);

		return new CActiveDataProvider('Bilancio', array(
			'criteria'=>$criteria,
		));
	}
}