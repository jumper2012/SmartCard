<?php

/**
 * This is the model class for table "ruangan".
 *
 * The followings are the available columns in table 'ruangan':
 * @property string $ID
 * @property string $SHORT_NAME
 * @property string $NAME
 * @property integer $KAPASITAS
 * @property string $KET
 * @property string $STATUS
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 * @property string $RFID
 *
 * The followings are the available model relations:
 * @property BeritaAcaraKuliah[] $beritaAcaraKuliahs
 * @property Jadwal[] $jadwals
 */
class Ruangan extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Ruangan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ruangan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('KAPASITAS', 'numerical', 'integerOnly' => true),
            array('ID, SHORT_NAME, LAST_UPDATE, RFID', 'length', 'max' => 20),
            array('NAME', 'length', 'max' => 200),
            array('STATUS', 'length', 'max' => 1),
            array('USER_ID', 'length', 'max' => 50),
            array('WS', 'length', 'max' => 15),
            array('KET', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, SHORT_NAME, NAME, KAPASITAS, KET, STATUS, LAST_UPDATE, USER_ID, WS, RFID', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'beritaAcaraKuliahs' => array(self::HAS_MANY, 'BeritaAcaraKuliah', 'RUANGAN'),
            'jadwals' => array(self::HAS_MANY, 'Jadwal', 'RUANGAN'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID Ruangan (Cth: GD521)',
            'SHORT_NAME' => 'Singkatan ',
            'NAME' => 'Nama (Cth: Gedung 521)',
            'KAPASITAS' => 'Kapasitas',
            'KET' => 'Ket',
            'STATUS' => 'Status',
            'LAST_UPDATE' => 'Last Update',
            'USER_ID' => 'User',
            'WS' => 'Ws',
            'RFID' => 'ID RFID',
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

        $criteria->compare('ID', $this->ID, true);
        $criteria->compare('SHORT_NAME', $this->SHORT_NAME, true);
        $criteria->compare('NAME', $this->NAME, true);
        $criteria->compare('KAPASITAS', $this->KAPASITAS);
        $criteria->compare('KET', $this->KET, true);
        $criteria->compare('STATUS', $this->STATUS, true);
        $criteria->compare('LAST_UPDATE', $this->LAST_UPDATE, true);
        $criteria->compare('USER_ID', $this->USER_ID, true);
        $criteria->compare('WS', $this->WS, true);
        $criteria->compare('RFID', $this->RFID, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
