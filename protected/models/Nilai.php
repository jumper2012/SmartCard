<?php

/**
 * This is the model class for table "nilai".
 *
 * The followings are the available columns in table 'nilai':
 * @property integer $ID_KUR
 * @property string $KODE_MK
 * @property string $TA
 * @property integer $SEM_TA
 * @property string $NIM
 * @property double $NA
 * @property string $NILAI
 * @property string $KELAS
 * @property integer $SKS
 * @property integer $SEM
 * @property string $WALI_APPROVAL
 * @property string $DIR_APPROVAL
 * @property string $DOSEN_APPROVAL
 * @property string $KETERANGAN
 * @property integer $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 */
class Nilai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nilai the static model class
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
		return 'nilai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KODE_MK, SKS, SEM', 'required'),
			array('ID_KUR, SEM_TA, SKS, SEM, LAST_UPDATE', 'numerical', 'integerOnly'=>true),
			array('NA', 'numerical'),
			array('KODE_MK, NIM', 'length', 'max'=>8),
			array('TA', 'length', 'max'=>30),
			array('NILAI', 'length', 'max'=>3),
			array('KELAS', 'length', 'max'=>5),
			array('WALI_APPROVAL, DIR_APPROVAL, DOSEN_APPROVAL', 'length', 'max'=>100),
			array('USER_ID', 'length', 'max'=>50),
			array('WS', 'length', 'max'=>15),
			array('KETERANGAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_KUR, KODE_MK, TA, SEM_TA, NIM, NA, NILAI, KELAS, SKS, SEM, WALI_APPROVAL, DIR_APPROVAL, DOSEN_APPROVAL, KETERANGAN, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'ID_KUR' => 'Id Kur',
			'KODE_MK' => 'Kode Mk',
			'TA' => 'Ta',
			'SEM_TA' => 'Sem Ta',
			'NIM' => 'Nim',
			'NA' => 'Na',
			'NILAI' => 'Nilai',
			'KELAS' => 'Kelas',
			'SKS' => 'Sks',
			'SEM' => 'Sem',
			'WALI_APPROVAL' => 'Wali Approval',
			'DIR_APPROVAL' => 'Dir Approval',
			'DOSEN_APPROVAL' => 'Dosen Approval',
			'KETERANGAN' => 'Keterangan',
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

		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('TA',$this->TA,true);
		$criteria->compare('SEM_TA',$this->SEM_TA);
		$criteria->compare('NIM',$this->NIM,true);
		$criteria->compare('NA',$this->NA);
		$criteria->compare('NILAI',$this->NILAI,true);
		$criteria->compare('KELAS',$this->KELAS,true);
		$criteria->compare('SKS',$this->SKS);
		$criteria->compare('SEM',$this->SEM);
		$criteria->compare('WALI_APPROVAL',$this->WALI_APPROVAL,true);
		$criteria->compare('DIR_APPROVAL',$this->DIR_APPROVAL,true);
		$criteria->compare('DOSEN_APPROVAL',$this->DOSEN_APPROVAL,true);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}