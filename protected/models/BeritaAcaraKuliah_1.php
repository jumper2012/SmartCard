<?php

/**
 * This is the model class for table "berita_acara_kuliah".
 *
 * The followings are the available columns in table 'berita_acara_kuliah':
 * @property integer $ID
 * @property integer $WEEK
 * @property integer $SESSION
 * @property integer $TA
 * @property integer $ID_KUR
 * @property string $KODE_MK
 * @property string $KELAS
 * @property string $TANGGAL
 * @property string $START_TIME
 * @property string $END_TIME
 * @property string $TOPIK
 * @property string $RUANGAN
 * @property string $AKTIFITAS
 * @property string $PIC
 * @property string $TIPE_KULIAH
 * @property string $METODE
 * @property string $ALAT_BANTU
 * @property string $CATATAN
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 *
 * The followings are the available model relations:
 * @property Kurikulum $kODEMK
 * @property Ruangan $rUANGAN
 */
class BeritaAcaraKuliah extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BeritaAcaraKuliah the static model class
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
		return 'berita_acara_kuliah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('WEEK, SESSION, TA, ID_KUR', 'numerical', 'integerOnly'=>true),
			array('KODE_MK', 'length', 'max'=>10),
			array('KELAS, RUANGAN', 'length', 'max'=>100),
			array('AKTIFITAS, USER_ID, WS', 'length', 'max'=>15),
			array('PIC, LAST_UPDATE', 'length', 'max'=>20),
			array('TIPE_KULIAH', 'length', 'max'=>9),
			array('TANGGAL, START_TIME, END_TIME, TOPIK, METODE, ALAT_BANTU, CATATAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, WEEK, SESSION, TA, ID_KUR, KODE_MK, KELAS, TANGGAL, START_TIME, END_TIME, TOPIK, RUANGAN, AKTIFITAS, PIC, TIPE_KULIAH, METODE, ALAT_BANTU, CATATAN, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'kODEMK' => array(self::BELONGS_TO, 'Kurikulum', 'KODE_MK'),
			'rUANGAN' => array(self::BELONGS_TO, 'Ruangan', 'RUANGAN'),
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
			'TA' => 'Ta',
			'ID_KUR' => 'Id Kur',
			'KODE_MK' => 'Kode Mk',
			'KELAS' => 'Kelas',
			'TANGGAL' => 'Tanggal',
			'START_TIME' => 'Start Time',
			'END_TIME' => 'End Time',
			'TOPIK' => 'Topik',
			'RUANGAN' => 'Ruangan',
			'AKTIFITAS' => 'Aktifitas',
			'PIC' => 'Pic',
			'TIPE_KULIAH' => 'Tipe Kuliah',
			'METODE' => 'Metode',
			'ALAT_BANTU' => 'Alat Bantu',
			'CATATAN' => 'Catatan',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('WEEK',$this->WEEK);
		$criteria->compare('SESSION',$this->SESSION);
		$criteria->compare('TA',$this->TA);
		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('KELAS',$this->KELAS,true);
		$criteria->compare('TANGGAL',$this->TANGGAL,true);
		$criteria->compare('START_TIME',$this->START_TIME,true);
		$criteria->compare('END_TIME',$this->END_TIME,true);
		$criteria->compare('TOPIK',$this->TOPIK,true);
		$criteria->compare('RUANGAN',$this->RUANGAN,true);
		$criteria->compare('AKTIFITAS',$this->AKTIFITAS,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('TIPE_KULIAH',$this->TIPE_KULIAH,true);
		$criteria->compare('METODE',$this->METODE,true);
		$criteria->compare('ALAT_BANTU',$this->ALAT_BANTU,true);
		$criteria->compare('CATATAN',$this->CATATAN,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchEdit()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('WEEK',$this->WEEK);
		$criteria->compare('SESSION',$this->SESSION);
		$criteria->compare('TA',$this->TA);
		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('KELAS',$this->KELAS,true);
		$criteria->compare('TANGGAL',date('Y-m-d'));
		$criteria->compare('START_TIME',$this->START_TIME,true);
		$criteria->compare('END_TIME',$this->END_TIME,true);
		$criteria->compare('TOPIK',$this->TOPIK,true);
		$criteria->compare('RUANGAN',$this->RUANGAN,true);
		$criteria->compare('AKTIFITAS',$this->AKTIFITAS,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('TIPE_KULIAH',$this->TIPE_KULIAH,true);
		$criteria->compare('METODE',$this->METODE,true);
		$criteria->compare('ALAT_BANTU',$this->ALAT_BANTU,true);
		$criteria->compare('CATATAN',$this->CATATAN,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchTanggal($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('WEEK',$this->WEEK);
		$criteria->compare('SESSION',$this->SESSION);
		$criteria->compare('TA',$this->TA);
		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('KELAS',$this->KELAS,true);
		$criteria->compare('TANGGAL',$id,true);
		$criteria->compare('START_TIME',$this->START_TIME,true);
		$criteria->compare('END_TIME',$this->END_TIME,true);
		$criteria->compare('TOPIK',$this->TOPIK,true);
		$criteria->compare('RUANGAN',$this->RUANGAN,true);
		$criteria->compare('AKTIFITAS',$this->AKTIFITAS,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('TIPE_KULIAH',$this->TIPE_KULIAH,true);
		$criteria->compare('METODE',$this->METODE,true);
		$criteria->compare('ALAT_BANTU',$this->ALAT_BANTU,true);
		$criteria->compare('CATATAN',$this->CATATAN,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}