<?php

/**
 * This is the model class for table "berita_acara_daftar_hadir".
 *
 * The followings are the available columns in table 'berita_acara_daftar_hadir':
 * @property integer $ID
 * @property integer $WEEK
 * @property integer $SESSION
 * @property string $START_TIME
 * @property string $END_TIME
 * @property integer $TA
 * @property integer $SEM
 * @property integer $ID_KUR
 * @property string $KODE_MK
 * @property string $NIM
 * @property string $STATUS
 * @property string $KETERANGAN
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 * @property string $WAKTU_ABSEN
 *
 * The followings are the available model relations:
 * @property Dim $nIM
 * @property Kurikulum $kODEMK
 * @property Kurikulum $iDKUR
 */
class BeritaAcaraDaftarHadir extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BeritaAcaraDaftarHadir the static model class
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
		return 'berita_acara_daftar_hadir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('WEEK, SESSION, TA, SEM, ID_KUR', 'numerical', 'integerOnly'=>true),
			array('KODE_MK', 'length', 'max'=>10),
			array('NIM', 'length', 'max'=>8),
			array('STATUS', 'length', 'max'=>7),
			array('LAST_UPDATE', 'length', 'max'=>20),
			array('USER_ID, WS', 'length', 'max'=>15),
			array('START_TIME, END_TIME, KETERANGAN, WAKTU_ABSEN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, WEEK, SESSION, START_TIME, END_TIME, TA, SEM, ID_KUR, KODE_MK, NIM, STATUS, KETERANGAN, LAST_UPDATE, USER_ID, WS, WAKTU_ABSEN', 'safe', 'on'=>'search'),
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
			'nIM' => array(self::BELONGS_TO, 'Dim', 'NIM'),
			'kODEMK' => array(self::BELONGS_TO, 'Kurikulum', 'KODE_MK'),
			'iDKUR' => array(self::BELONGS_TO, 'Kurikulum', 'ID_KUR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'WEEK' => 'Week',
			'SESSION' => 'Session',
			'START_TIME' => 'Start Time',
			'END_TIME' => 'End Time',
			'TA' => 'Ta',
			'SEM' => 'Sem',
			'ID_KUR' => 'Id Kur',
			'KODE_MK' => 'Kode Mk',
			'NIM' => 'Nim',
			'STATUS' => 'Status',
			'KETERANGAN' => 'Keterangan',
			'LAST_UPDATE' => 'Last Update',
			'USER_ID' => 'User',
			'WS' => 'Ws',
			'WAKTU_ABSEN' => 'Waktu Absen',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('WEEK',$this->WEEK);
		$criteria->compare('SESSION',$this->SESSION);
		$criteria->compare('START_TIME',$this->START_TIME,true);
		$criteria->compare('END_TIME',$this->END_TIME,true);
		$criteria->compare('TA',$this->TA);
		$criteria->compare('SEM',$this->SEM);
		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('NIM',$this->NIM,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);
		$criteria->compare('WAKTU_ABSEN',$this->WAKTU_ABSEN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}