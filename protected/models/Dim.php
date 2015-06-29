<?php

/**
 * This is the model class for table "dim".
 *
 * The followings are the available columns in table 'dim':
 * @property string $NIM
 * @property string $NO_USM
 * @property string $JALUR
 * @property string $USER_NAME
 * @property string $KBK_ID
 * @property string $KPT_PRODI
 * @property integer $ID_KUR
 * @property string $NAMA
 * @property string $TGL_LAHIR
 * @property string $TEMPAT_LAHIR
 * @property string $GOL_DARAH
 * @property string $JENIS_KELAMIN
 * @property string $AGAMA
 * @property string $ALAMAT
 * @property string $KABUPATEN
 * @property string $KODE_POS
 * @property string $EMAIL
 * @property string $TELEPON
 * @property string $HP
 * @property string $HP2
 * @property string $NAMA_SMA
 * @property string $NO_IJAZAH_SMA
 * @property string $ALAMAT_SMA
 * @property string $KABUPATEN_SMA
 * @property string $KODEPOS_SMA
 * @property string $TELEPON_SMA
 * @property integer $THN_MASUK
 * @property string $STATUS_AKHIR
 * @property string $NAMA_AYAH
 * @property string $NAMA_IBU
 * @property string $NO_HP_AYAH
 * @property string $NO_HP_IBU
 * @property string $ALAMAT_ORANGTUA
 * @property string $PEKERJAAN_AYAH
 * @property string $KETERANGAN_PEKERJAAN_AYAH
 * @property string $PENGHASILAN_AYAH
 * @property string $PEKERJAAN_IBU
 * @property string $KETERANGAN_PEKERJAAN_IBU
 * @property string $PENGHASILAN_IBU
 * @property string $NAMA_WALI
 * @property string $PEKERJAAN_WALI
 * @property string $KETERANGAN_PEKERJAAN_WALI
 * @property string $PENGHASILAN_WALI
 * @property string $ALAMAT_WALI
 * @property string $TELEPON_WALI
 * @property string $NO_HP_WALI
 * @property string $PENDAPATAN
 * @property double $IPK
 * @property integer $ANAK_KE
 * @property integer $DARI_JLH_ANAK
 * @property integer $JUMLAH_TANGGUNGAN
 * @property double $NILAI_USM
 * @property integer $SCORE_IQ
 * @property string $REKOMENDASI_PSIKOTEST
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 *
 * The followings are the available model relations:
 * @property BeritaAcaraDaftarHadir[] $beritaAcaraDaftarHadirs
 */
class Dim extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dim the static model class
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
		return 'dim';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('WS', 'required'),
			array('ID_KUR, THN_MASUK, ANAK_KE, DARI_JLH_ANAK, JUMLAH_TANGGUNGAN, SCORE_IQ', 'numerical', 'integerOnly'=>true),
			array('IPK, NILAI_USM', 'numerical'),
			array('NIM, KODEPOS_SMA', 'length', 'max'=>8),
			array('NO_USM', 'length', 'max'=>15),
			array('JALUR, KBK_ID, TELEPON_WALI', 'length', 'max'=>20),
			array('USER_NAME, KPT_PRODI', 'length', 'max'=>10),
			array('NAMA, TEMPAT_LAHIR, KABUPATEN, EMAIL, TELEPON, HP, HP2, NAMA_SMA, TELEPON_SMA, STATUS_AKHIR, NAMA_AYAH, NAMA_IBU, NO_HP_AYAH, NO_HP_IBU, PENGHASILAN_AYAH, PENGHASILAN_IBU, NAMA_WALI, PEKERJAAN_WALI, PENGHASILAN_WALI, NO_HP_WALI, PENDAPATAN, USER_ID', 'length', 'max'=>50),
			array('GOL_DARAH', 'length', 'max'=>2),
			array('JENIS_KELAMIN', 'length', 'max'=>1),
			array('AGAMA', 'length', 'max'=>30),
			array('KODE_POS', 'length', 'max'=>5),
			array('NO_IJAZAH_SMA, KABUPATEN_SMA, PEKERJAAN_AYAH, PEKERJAAN_IBU', 'length', 'max'=>100),
			array('REKOMENDASI_PSIKOTEST', 'length', 'max'=>4),
			array('LAST_UPDATE', 'length', 'max'=>14),
			array('TGL_LAHIR, ALAMAT, ALAMAT_SMA, ALAMAT_ORANGTUA, KETERANGAN_PEKERJAAN_AYAH, KETERANGAN_PEKERJAAN_IBU, KETERANGAN_PEKERJAAN_WALI, ALAMAT_WALI', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('NIM, NO_USM, JALUR, USER_NAME, KBK_ID, KPT_PRODI, ID_KUR, NAMA, TGL_LAHIR, TEMPAT_LAHIR, GOL_DARAH, JENIS_KELAMIN, AGAMA, ALAMAT, KABUPATEN, KODE_POS, EMAIL, TELEPON, HP, HP2, NAMA_SMA, NO_IJAZAH_SMA, ALAMAT_SMA, KABUPATEN_SMA, KODEPOS_SMA, TELEPON_SMA, THN_MASUK, STATUS_AKHIR, NAMA_AYAH, NAMA_IBU, NO_HP_AYAH, NO_HP_IBU, ALAMAT_ORANGTUA, PEKERJAAN_AYAH, KETERANGAN_PEKERJAAN_AYAH, PENGHASILAN_AYAH, PEKERJAAN_IBU, KETERANGAN_PEKERJAAN_IBU, PENGHASILAN_IBU, NAMA_WALI, PEKERJAAN_WALI, KETERANGAN_PEKERJAAN_WALI, PENGHASILAN_WALI, ALAMAT_WALI, TELEPON_WALI, NO_HP_WALI, PENDAPATAN, IPK, ANAK_KE, DARI_JLH_ANAK, JUMLAH_TANGGUNGAN, NILAI_USM, SCORE_IQ, REKOMENDASI_PSIKOTEST, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'beritaAcaraDaftarHadirs' => array(self::HAS_MANY, 'BeritaAcaraDaftarHadir', 'NIM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NIM' => 'Nim',
			'NO_USM' => 'No Usm',
			'JALUR' => 'Jalur',
			'USER_NAME' => 'User Name',
			'KBK_ID' => 'Kbk',
			'KPT_PRODI' => 'Kpt Prodi',
			'ID_KUR' => 'Id Kur',
			'NAMA' => 'Nama',
			'TGL_LAHIR' => 'Tgl Lahir',
			'TEMPAT_LAHIR' => 'Tempat Lahir',
			'GOL_DARAH' => 'Gol Darah',
			'JENIS_KELAMIN' => 'Jenis Kelamin',
			'AGAMA' => 'Agama',
			'ALAMAT' => 'Alamat',
			'KABUPATEN' => 'Kabupaten',
			'KODE_POS' => 'Kode Pos',
			'EMAIL' => 'Email',
			'TELEPON' => 'Telepon',
			'HP' => 'Hp',
			'HP2' => 'Hp2',
			'NAMA_SMA' => 'Nama Sma',
			'NO_IJAZAH_SMA' => 'No Ijazah Sma',
			'ALAMAT_SMA' => 'Alamat Sma',
			'KABUPATEN_SMA' => 'Kabupaten Sma',
			'KODEPOS_SMA' => 'Kodepos Sma',
			'TELEPON_SMA' => 'Telepon Sma',
			'THN_MASUK' => 'Thn Masuk',
			'STATUS_AKHIR' => 'Status Akhir',
			'NAMA_AYAH' => 'Nama Ayah',
			'NAMA_IBU' => 'Nama Ibu',
			'NO_HP_AYAH' => 'No Hp Ayah',
			'NO_HP_IBU' => 'No Hp Ibu',
			'ALAMAT_ORANGTUA' => 'Alamat Orangtua',
			'PEKERJAAN_AYAH' => 'Pekerjaan Ayah',
			'KETERANGAN_PEKERJAAN_AYAH' => 'Keterangan Pekerjaan Ayah',
			'PENGHASILAN_AYAH' => 'Penghasilan Ayah',
			'PEKERJAAN_IBU' => 'Pekerjaan Ibu',
			'KETERANGAN_PEKERJAAN_IBU' => 'Keterangan Pekerjaan Ibu',
			'PENGHASILAN_IBU' => 'Penghasilan Ibu',
			'NAMA_WALI' => 'Nama Wali',
			'PEKERJAAN_WALI' => 'Pekerjaan Wali',
			'KETERANGAN_PEKERJAAN_WALI' => 'Keterangan Pekerjaan Wali',
			'PENGHASILAN_WALI' => 'Penghasilan Wali',
			'ALAMAT_WALI' => 'Alamat Wali',
			'TELEPON_WALI' => 'Telepon Wali',
			'NO_HP_WALI' => 'No Hp Wali',
			'PENDAPATAN' => 'Pendapatan',
			'IPK' => 'Ipk',
			'ANAK_KE' => 'Anak Ke',
			'DARI_JLH_ANAK' => 'Dari Jlh Anak',
			'JUMLAH_TANGGUNGAN' => 'Jumlah Tanggungan',
			'NILAI_USM' => 'Nilai Usm',
			'SCORE_IQ' => 'Score Iq',
			'REKOMENDASI_PSIKOTEST' => 'Rekomendasi Psikotest',
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
		$criteria->compare('NO_USM',$this->NO_USM,true);
		$criteria->compare('JALUR',$this->JALUR,true);
		$criteria->compare('USER_NAME',$this->USER_NAME,true);
		$criteria->compare('KBK_ID',$this->KBK_ID,true);
		$criteria->compare('KPT_PRODI',$this->KPT_PRODI,true);
		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('TGL_LAHIR',$this->TGL_LAHIR,true);
		$criteria->compare('TEMPAT_LAHIR',$this->TEMPAT_LAHIR,true);
		$criteria->compare('GOL_DARAH',$this->GOL_DARAH,true);
		$criteria->compare('JENIS_KELAMIN',$this->JENIS_KELAMIN,true);
		$criteria->compare('AGAMA',$this->AGAMA,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('KABUPATEN',$this->KABUPATEN,true);
		$criteria->compare('KODE_POS',$this->KODE_POS,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('TELEPON',$this->TELEPON,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('HP2',$this->HP2,true);
		$criteria->compare('NAMA_SMA',$this->NAMA_SMA,true);
		$criteria->compare('NO_IJAZAH_SMA',$this->NO_IJAZAH_SMA,true);
		$criteria->compare('ALAMAT_SMA',$this->ALAMAT_SMA,true);
		$criteria->compare('KABUPATEN_SMA',$this->KABUPATEN_SMA,true);
		$criteria->compare('KODEPOS_SMA',$this->KODEPOS_SMA,true);
		$criteria->compare('TELEPON_SMA',$this->TELEPON_SMA,true);
		$criteria->compare('THN_MASUK',$this->THN_MASUK);
		$criteria->compare('STATUS_AKHIR',$this->STATUS_AKHIR,true);
		$criteria->compare('NAMA_AYAH',$this->NAMA_AYAH,true);
		$criteria->compare('NAMA_IBU',$this->NAMA_IBU,true);
		$criteria->compare('NO_HP_AYAH',$this->NO_HP_AYAH,true);
		$criteria->compare('NO_HP_IBU',$this->NO_HP_IBU,true);
		$criteria->compare('ALAMAT_ORANGTUA',$this->ALAMAT_ORANGTUA,true);
		$criteria->compare('PEKERJAAN_AYAH',$this->PEKERJAAN_AYAH,true);
		$criteria->compare('KETERANGAN_PEKERJAAN_AYAH',$this->KETERANGAN_PEKERJAAN_AYAH,true);
		$criteria->compare('PENGHASILAN_AYAH',$this->PENGHASILAN_AYAH,true);
		$criteria->compare('PEKERJAAN_IBU',$this->PEKERJAAN_IBU,true);
		$criteria->compare('KETERANGAN_PEKERJAAN_IBU',$this->KETERANGAN_PEKERJAAN_IBU,true);
		$criteria->compare('PENGHASILAN_IBU',$this->PENGHASILAN_IBU,true);
		$criteria->compare('NAMA_WALI',$this->NAMA_WALI,true);
		$criteria->compare('PEKERJAAN_WALI',$this->PEKERJAAN_WALI,true);
		$criteria->compare('KETERANGAN_PEKERJAAN_WALI',$this->KETERANGAN_PEKERJAAN_WALI,true);
		$criteria->compare('PENGHASILAN_WALI',$this->PENGHASILAN_WALI,true);
		$criteria->compare('ALAMAT_WALI',$this->ALAMAT_WALI,true);
		$criteria->compare('TELEPON_WALI',$this->TELEPON_WALI,true);
		$criteria->compare('NO_HP_WALI',$this->NO_HP_WALI,true);
		$criteria->compare('PENDAPATAN',$this->PENDAPATAN,true);
		$criteria->compare('IPK',$this->IPK);
		$criteria->compare('ANAK_KE',$this->ANAK_KE);
		$criteria->compare('DARI_JLH_ANAK',$this->DARI_JLH_ANAK);
		$criteria->compare('JUMLAH_TANGGUNGAN',$this->JUMLAH_TANGGUNGAN);
		$criteria->compare('NILAI_USM',$this->NILAI_USM);
		$criteria->compare('SCORE_IQ',$this->SCORE_IQ);
		$criteria->compare('REKOMENDASI_PSIKOTEST',$this->REKOMENDASI_PSIKOTEST,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}