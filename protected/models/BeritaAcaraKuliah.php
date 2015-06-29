<?php

/**
 * This is the model class for table "berita_acara_kuliah".
 *
 * The followings are the available columns in table 'berita_acara_kuliah':
 * @property integer $ID
 * @property integer $ID_DETAIL_JADWAL
 * @property string $TIPE_KULIAH
 * @property string $CATATAN
 *
 * The followings are the available model relations:
 * @property DJadwal $iDDETAILJADWAL
 */
class BeritaAcaraKuliah extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BeritaAcaraKuliah the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'berita_acara_kuliah';
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
            array('TIPE_KULIAH', 'length', 'max' => 9),
            array('CATATAN', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, ID_DETAIL_JADWAL, TIPE_KULIAH, CATATAN', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
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
            'TIPE_KULIAH' => 'Tipe Kuliah',
            'CATATAN' => 'Catatan',
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
        $criteria->compare('TIPE_KULIAH', $this->TIPE_KULIAH, true);
        $criteria->compare('CATATAN', $this->CATATAN, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
