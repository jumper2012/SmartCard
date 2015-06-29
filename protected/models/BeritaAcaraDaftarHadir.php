<?php

/**
 * This is the model class for table "berita_acara_daftar_hadir".
 *
 * The followings are the available columns in table 'berita_acara_daftar_hadir':
 * @property integer $ID
 * @property integer $ID_DETAIL_JADWAL
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
 * @property DJadwal $iDDETAILJADWAL
 */
class BeritaAcaraDaftarHadir extends CActiveRecord {
	public static $tempID = null;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BeritaAcaraDaftarHadir the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'berita_acara_daftar_hadir';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ID_DETAIL_JADWAL', 'required'),
            array('ID_DETAIL_JADWAL', 'numerical', 'integerOnly' => true),
            array('NIM', 'length', 'max' => 8),
            array('STATUS', 'length', 'max' => 7),
            array('LAST_UPDATE', 'length', 'max' => 20),
            array('USER_ID, WS', 'length', 'max' => 15),
            array('KETERANGAN, WAKTU_ABSEN', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, ID_DETAIL_JADWAL, NIM, STATUS, KETERANGAN, LAST_UPDATE, USER_ID, WS, WAKTU_ABSEN', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nim' => array(self::BELONGS_TO, 'Dim', 'NIM'),
            'iddetailjadwal' => array(self::BELONGS_TO, 'DJadwal', 'ID_DETAIL_JADWAL'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID',
            'ID_DETAIL_JADWAL' => 'Id Detail Jadwal',
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
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('ID_DETAIL_JADWAL', $this->ID_DETAIL_JADWAL);
        $criteria->compare('NIM', $this->NIM, true);
        $criteria->compare('STATUS', $this->STATUS, true);
        $criteria->compare('KETERANGAN', $this->KETERANGAN, true);
        $criteria->compare('LAST_UPDATE', $this->LAST_UPDATE, true);
        $criteria->compare('USER_ID', $this->USER_ID, true);
        $criteria->compare('WS', $this->WS, true);
        $criteria->compare('WAKTU_ABSEN', $this->WAKTU_ABSEN, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchByIdJadwal($id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('ID_DETAIL_JADWAL', $id, true);
        $criteria->compare('NIM', $this->NIM, true);
        $criteria->compare('STATUS', $this->STATUS, true);
        $criteria->compare('KETERANGAN', $this->KETERANGAN, true);
        $criteria->compare('LAST_UPDATE', $this->LAST_UPDATE, true);
        $criteria->compare('USER_ID', $this->USER_ID, true);
        $criteria->compare('WS', $this->WS, true);
        $criteria->compare('WAKTU_ABSEN', $this->WAKTU_ABSEN, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pagesize' => 50,
            ),
        ));
    }

}
