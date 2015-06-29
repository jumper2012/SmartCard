<?php

/**
 * This is the model class for table "d_jadwal".
 *
 * The followings are the available columns in table 'd_jadwal':
 * @property integer $ID
 * @property integer $ID_JADWAL
 * @property integer $SESSION
 * @property string $START_TIME
 * @property string $END_TIME
 * @property string $KODE_MK
 * @property string $RUANGAN
 * @property string $TOPIK
 * @property string $SUB_TOPIK
 * @property string $OBJEKTIF
 * @property string $AKTIFITAS
 * @property string $PIC
 * @property string $METODE
 * @property string $ALAT_BANTU
 * @property string $KET
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 *
 * The followings are the available model relations:
 * @property MJadwal $iDJADWAL
 * @property Kurikulum $kODEMK
 * @property Pegawai $pIC
 * @property Ruangan $rUANGAN
 */
class DJadwal extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DJadwal the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'd_jadwal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ID_JADWAL, SESSION, KODE_MK, PIC', 'required'),
            array('ID_JADWAL, SESSION', 'numerical', 'integerOnly' => true),
            array('KODE_MK', 'length', 'max' => 8),
            array('RUANGAN, PIC, LAST_UPDATE', 'length', 'max' => 20),
            array('TOPIK, KET', 'length', 'max' => 255),
            array('AKTIFITAS', 'length', 'max' => 9),
            array('USER_ID, WS', 'length', 'max' => 15),
            array('START_TIME, END_TIME, SUB_TOPIK, OBJEKTIF, METODE, ALAT_BANTU, USER_ID, WS', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, ID_JADWAL, SESSION, START_TIME, END_TIME, KODE_MK, RUANGAN, TOPIK, SUB_TOPIK, OBJEKTIF, AKTIFITAS, PIC, METODE, ALAT_BANTU, KET, LAST_UPDATE, USER_ID, WS', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idjadwal' => array(self::BELONGS_TO, 'MJadwal', 'ID_JADWAL'),
            'kodemk' => array(self::BELONGS_TO, 'Kurikulum', 'KODE_MK'),
            'pic' => array(self::BELONGS_TO, 'Pegawai', 'PIC'),
            'ruangan' => array(self::BELONGS_TO, 'Ruangan', 'RUANGAN'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID',
            'ID_JADWAL' => 'Id Jadwal',
            'SESSION' => 'Sesi',
            'START_TIME' => 'Waktu Mulai',
            'END_TIME' => 'Waktu Selesai',
            'KODE_MK' => 'Kode Mata Kuliah',
            'RUANGAN' => 'Ruangan',
            'TOPIK' => 'Topik',
            'SUB_TOPIK' => 'Sub Topik',
            'OBJEKTIF' => 'Objektif',
            'AKTIFITAS' => 'Aktifitas',
            'PIC' => 'Pengajar',
            'METODE' => 'Metode',
            'ALAT_BANTU' => 'Alat Bantu',
            'KET' => 'Ket',
            'LAST_UPDATE' => 'Last Update',
            'USER_ID' => 'User',
            'WS' => 'Ws',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('ID_JADWAL', $this->ID_JADWAL);
        $criteria->compare('SESSION', $this->SESSION);
        $criteria->compare('START_TIME', $this->START_TIME, true);
        $criteria->compare('END_TIME', $this->END_TIME, true);
        $criteria->compare('KODE_MK', $this->KODE_MK, true);
        $criteria->compare('RUANGAN', $this->RUANGAN, true);
        $criteria->compare('TOPIK', $this->TOPIK, true);
        $criteria->compare('SUB_TOPIK', $this->SUB_TOPIK, true);
        $criteria->compare('OBJEKTIF', $this->OBJEKTIF, true);
        $criteria->compare('AKTIFITAS', $this->AKTIFITAS, true);
        $criteria->compare('PIC', $this->PIC, true);
        $criteria->compare('METODE', $this->METODE, true);
        $criteria->compare('ALAT_BANTU', $this->ALAT_BANTU, true);
        $criteria->compare('KET', $this->KET, true);
        $criteria->compare('LAST_UPDATE', $this->LAST_UPDATE, true);
        $criteria->compare('USER_ID', $this->USER_ID);
        $criteria->compare('WS', $this->WS);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchByIDJadwal($id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('ID_JADWAL', $id, true);
        $criteria->compare('SESSION', $this->SESSION);
        $criteria->compare('START_TIME', $this->START_TIME, true);
        $criteria->compare('END_TIME', $this->END_TIME, true);
        $criteria->compare('KODE_MK', $this->KODE_MK, true);
        $criteria->compare('RUANGAN', $this->RUANGAN, true);
        $criteria->compare('TOPIK', $this->TOPIK, true);
        $criteria->compare('SUB_TOPIK', $this->SUB_TOPIK, true);
        $criteria->compare('OBJEKTIF', $this->OBJEKTIF, true);
        $criteria->compare('AKTIFITAS', $this->AKTIFITAS, true);
        $criteria->compare('PIC', $this->PIC, true);
        $criteria->compare('METODE', $this->METODE, true);
        $criteria->compare('ALAT_BANTU', $this->ALAT_BANTU, true);
        $criteria->compare('KET', $this->KET, true);
        $criteria->compare('LAST_UPDATE', $this->LAST_UPDATE, true);
        $criteria->compare('USER_ID', $this->USER_ID);
        $criteria->compare('WS', $this->WS);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    public function getAktifitas($val) {

        switch ($val) {
            case "T":
                return "Teori";
                break;
            case "P":
                return "Praktikum";
                break;
            case "M":
                return "Mandiri";
                break;
        }
    }

}
