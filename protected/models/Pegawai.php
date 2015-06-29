<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property string $ID
 * @property string $NIP
 * @property string $KPT_NO
 * @property string $USER_NAME
 * @property string $NAMA
 * @property string $POSISI
 * @property string $ALIAS
 * @property string $TGL_LAHIR
 * @property string $TEMPAT_LAHIR
 * @property string $JENIS_KELAMIN
 * @property string $GOL_DARAH
 * @property string $TGL_MASUK
 * @property string $TGL_KELUAR
 * @property string $AGAMA
 * @property string $KBK_ID
 * @property string $EXT_NUM
 * @property string $HP
 * @property string $EMAIL
 * @property string $ALAMAT_LIBUR
 * @property string $KOTA
 * @property string $KODE_POS
 * @property string $TELEPON
 * @property string $KTP
 * @property string $PENDIDIKAN
 * @property string $JABATAN
 * @property string $PENDIDIKAN_TERTINGGI
 * @property string $STUDY_AREA1
 * @property string $STUDY_AREA2
 * @property string $STATUS
 * @property string $NAMA_BAPAK
 * @property string $NAMA_IBU
 * @property string $PEKERJAAN_ORTU
 * @property string $NAMA_P
 * @property string $TMP_LAHIR_P
 * @property string $TGL_LAHIR_P
 * @property string $KET
 * @property string $STATUS_AKHIR
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 */
class Pegawai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
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
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KET', 'required'),
			array('ID, NIP, USER_NAME, KBK_ID, HP, JABATAN, PENDIDIKAN_TERTINGGI', 'length', 'max'=>20),
			array('KPT_NO', 'length', 'max'=>10),
			array('NAMA, TEMPAT_LAHIR, KOTA, STUDY_AREA1, STUDY_AREA2, NAMA_BAPAK, NAMA_IBU, NAMA_P, TMP_LAHIR_P, USER_ID', 'length', 'max'=>50),
			array('POSISI, ALAMAT_LIBUR, PEKERJAAN_ORTU', 'length', 'max'=>100),
			array('ALIAS, KODE_POS, STATUS_AKHIR', 'length', 'max'=>5),
			array('JENIS_KELAMIN, STATUS', 'length', 'max'=>1),
			array('GOL_DARAH', 'length', 'max'=>2),
			array('AGAMA', 'length', 'max'=>30),
			array('EXT_NUM', 'length', 'max'=>3),
			array('EMAIL, KTP, PENDIDIKAN', 'length', 'max'=>255),
			array('TELEPON, WS', 'length', 'max'=>15),
			array('LAST_UPDATE', 'length', 'max'=>14),
			array('TGL_LAHIR, TGL_MASUK, TGL_KELUAR, TGL_LAHIR_P', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NIP, KPT_NO, USER_NAME, NAMA, POSISI, ALIAS, TGL_LAHIR, TEMPAT_LAHIR, JENIS_KELAMIN, GOL_DARAH, TGL_MASUK, TGL_KELUAR, AGAMA, KBK_ID, EXT_NUM, HP, EMAIL, ALAMAT_LIBUR, KOTA, KODE_POS, TELEPON, KTP, PENDIDIKAN, JABATAN, PENDIDIKAN_TERTINGGI, STUDY_AREA1, STUDY_AREA2, STATUS, NAMA_BAPAK, NAMA_IBU, PEKERJAAN_ORTU, NAMA_P, TMP_LAHIR_P, TGL_LAHIR_P, KET, STATUS_AKHIR, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'NIP' => 'Nip',
			'KPT_NO' => 'Kpt No',
			'USER_NAME' => 'User Name',
			'NAMA' => 'Nama',
			'POSISI' => 'Posisi',
			'ALIAS' => 'Alias',
			'TGL_LAHIR' => 'Tgl Lahir',
			'TEMPAT_LAHIR' => 'Tempat Lahir',
			'JENIS_KELAMIN' => 'Jenis Kelamin',
			'GOL_DARAH' => 'Gol Darah',
			'TGL_MASUK' => 'Tgl Masuk',
			'TGL_KELUAR' => 'Tgl Keluar',
			'AGAMA' => 'Agama',
			'KBK_ID' => 'Kbk',
			'EXT_NUM' => 'Ext Num',
			'HP' => 'Hp',
			'EMAIL' => 'Email',
			'ALAMAT_LIBUR' => 'Alamat Libur',
			'KOTA' => 'Kota',
			'KODE_POS' => 'Kode Pos',
			'TELEPON' => 'Telepon',
			'KTP' => 'Ktp',
			'PENDIDIKAN' => 'Pendidikan',
			'JABATAN' => 'Jabatan',
			'PENDIDIKAN_TERTINGGI' => 'Pendidikan Tertinggi',
			'STUDY_AREA1' => 'Study Area1',
			'STUDY_AREA2' => 'Study Area2',
			'STATUS' => 'Status',
			'NAMA_BAPAK' => 'Nama Bapak',
			'NAMA_IBU' => 'Nama Ibu',
			'PEKERJAAN_ORTU' => 'Pekerjaan Ortu',
			'NAMA_P' => 'Nama P',
			'TMP_LAHIR_P' => 'Tmp Lahir P',
			'TGL_LAHIR_P' => 'Tgl Lahir P',
			'KET' => 'Ket',
			'STATUS_AKHIR' => 'Status Akhir',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('NIP',$this->NIP,true);
		$criteria->compare('KPT_NO',$this->KPT_NO,true);
		$criteria->compare('USER_NAME',$this->USER_NAME,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('POSISI',$this->POSISI,true);
		$criteria->compare('ALIAS',$this->ALIAS,true);
		$criteria->compare('TGL_LAHIR',$this->TGL_LAHIR,true);
		$criteria->compare('TEMPAT_LAHIR',$this->TEMPAT_LAHIR,true);
		$criteria->compare('JENIS_KELAMIN',$this->JENIS_KELAMIN,true);
		$criteria->compare('GOL_DARAH',$this->GOL_DARAH,true);
		$criteria->compare('TGL_MASUK',$this->TGL_MASUK,true);
		$criteria->compare('TGL_KELUAR',$this->TGL_KELUAR,true);
		$criteria->compare('AGAMA',$this->AGAMA,true);
		$criteria->compare('KBK_ID',$this->KBK_ID,true);
		$criteria->compare('EXT_NUM',$this->EXT_NUM,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('ALAMAT_LIBUR',$this->ALAMAT_LIBUR,true);
		$criteria->compare('KOTA',$this->KOTA,true);
		$criteria->compare('KODE_POS',$this->KODE_POS,true);
		$criteria->compare('TELEPON',$this->TELEPON,true);
		$criteria->compare('KTP',$this->KTP,true);
		$criteria->compare('PENDIDIKAN',$this->PENDIDIKAN,true);
		$criteria->compare('JABATAN',$this->JABATAN,true);
		$criteria->compare('PENDIDIKAN_TERTINGGI',$this->PENDIDIKAN_TERTINGGI,true);
		$criteria->compare('STUDY_AREA1',$this->STUDY_AREA1,true);
		$criteria->compare('STUDY_AREA2',$this->STUDY_AREA2,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('NAMA_BAPAK',$this->NAMA_BAPAK,true);
		$criteria->compare('NAMA_IBU',$this->NAMA_IBU,true);
		$criteria->compare('PEKERJAAN_ORTU',$this->PEKERJAAN_ORTU,true);
		$criteria->compare('NAMA_P',$this->NAMA_P,true);
		$criteria->compare('TMP_LAHIR_P',$this->TMP_LAHIR_P,true);
		$criteria->compare('TGL_LAHIR_P',$this->TGL_LAHIR_P,true);
		$criteria->compare('KET',$this->KET,true);
		$criteria->compare('STATUS_AKHIR',$this->STATUS_AKHIR,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}