<?php

/**
 * This is the model class for table "registrasi".
 *
 * The followings are the available columns in table 'registrasi':
 * @property string $NIM
 * @property string $TA
 * @property integer $SEM_TA
 * @property integer $SEM
 * @property string $TGL_DAFTAR
 * @property double $KEUANGAN
 * @property string $KELAS
 * @property string $ID_WALI
 * @property double $NR
 * @property integer $KOA_APPROVAL
 * @property integer $KOA_APPROVAL_BP
 * @property integer $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 */
class Registrasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registrasi the static model class
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
		return 'registrasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SEM_TA, SEM, KOA_APPROVAL, KOA_APPROVAL_BP, LAST_UPDATE', 'numerical', 'integerOnly'=>true),
			array('KEUANGAN, NR', 'numerical'),
			array('NIM', 'length', 'max'=>8),
			array('TA', 'length', 'max'=>30),
			array('KELAS, ID_WALI', 'length', 'max'=>20),
			array('USER_ID, WS', 'length', 'max'=>15),
			array('TGL_DAFTAR', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('NIM, TA, SEM_TA, SEM, TGL_DAFTAR, KEUANGAN, KELAS, ID_WALI, NR, KOA_APPROVAL, KOA_APPROVAL_BP, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'NIM' => 'Nim',
			'TA' => 'Ta',
			'SEM_TA' => 'Sem Ta',
			'SEM' => 'Sem',
			'TGL_DAFTAR' => 'Tgl Daftar',
			'KEUANGAN' => 'Keuangan',
			'KELAS' => 'Kelas',
			'ID_WALI' => 'Id Wali',
			'NR' => 'Nr',
			'KOA_APPROVAL' => 'Koa Approval',
			'KOA_APPROVAL_BP' => 'Koa Approval Bp',
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

		$criteria->compare('NIM',$this->NIM,true);
		$criteria->compare('TA',$this->TA,true);
		$criteria->compare('SEM_TA',$this->SEM_TA);
		$criteria->compare('SEM',$this->SEM);
		$criteria->compare('TGL_DAFTAR',$this->TGL_DAFTAR,true);
		$criteria->compare('KEUANGAN',$this->KEUANGAN);
		$criteria->compare('KELAS',$this->KELAS,true);
		$criteria->compare('ID_WALI',$this->ID_WALI,true);
		$criteria->compare('NR',$this->NR);
		$criteria->compare('KOA_APPROVAL',$this->KOA_APPROVAL);
		$criteria->compare('KOA_APPROVAL_BP',$this->KOA_APPROVAL_BP);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}