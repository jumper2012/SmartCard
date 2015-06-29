<?php

/**
 * This is the model class for table "pengajar".
 *
 * The followings are the available columns in table 'pengajar':
 * @property string $DOSEN_ID
 * @property integer $TA
 * @property integer $ID_KUR
 * @property string $KODE_MK
 * @property string $ROLE
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 */
class Pengajar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengajar the static model class
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
		return 'pengajar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KODE_MK', 'required'),
			array('TA, ID_KUR', 'numerical', 'integerOnly'=>true),
			array('DOSEN_ID', 'length', 'max'=>20),
			array('KODE_MK', 'length', 'max'=>8),
			array('ROLE', 'length', 'max'=>1),
			array('LAST_UPDATE', 'length', 'max'=>14),
			array('USER_ID', 'length', 'max'=>50),
			array('WS', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('DOSEN_ID, TA, ID_KUR, KODE_MK, ROLE, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'DOSEN_ID' => 'Dosen',
			'TA' => 'Ta',
			'ID_KUR' => 'Id Kur',
			'KODE_MK' => 'Kode Mk',
			'ROLE' => 'Role',
			'LAST_UPDATE' => 'Last Update',
			'USER_ID' => 'User',
			'WS' => 'Ws',
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

		$criteria->compare('DOSEN_ID',$this->DOSEN_ID,true);
		$criteria->compare('TA',$this->TA);
		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('ROLE',$this->ROLE,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}