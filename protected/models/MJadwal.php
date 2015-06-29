<?php

/**
 * This is the model class for table "m_jadwal".
 *
 * The followings are the available columns in table 'm_jadwal':
 * @property integer $ID
 * @property integer $WEEK
 * @property string $TANGGAL
 * @property integer $TA
 * @property integer $ID_KUR
 * @property string $KELAS
 *
 * The followings are the available model relations:
 * @property DJadwal[] $dJadwals
 * @property Kurikulum $iDKUR
 */
class MJadwal extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MJadwal the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_jadwal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TANGGAL, TA, ID_KUR', 'required'),
            array('WEEK, TA, ID_KUR', 'numerical', 'integerOnly' => true),
            array('KELAS', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, WEEK, TANGGAL, TA, ID_KUR, KELAS', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'djadwal' => array(self::HAS_MANY, 'DJadwal', 'ID_JADWAL'),
            'idkur' => array(self::BELONGS_TO, 'Kurikulum', 'ID_KUR'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID',
            'WEEK' => 'Minggu',
            'TANGGAL' => 'Tanggal',
            'TA' => 'Tahun Ajaran',
            'ID_KUR' => 'Kurikulum',
            'KELAS' => 'Kelas',
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
        $criteria->compare('WEEK', $this->WEEK, true);
        $criteria->compare('TANGGAL', $this->TANGGAL, true);
        $criteria->compare('TA', $this->TA, true);
        $criteria->compare('ID_KUR', $this->ID_KUR, true);
        $criteria->compare('KELAS', $this->KELAS, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        $this->TANGGAL = date('Y-m-d', strtotime($this->TANGGAL));
        return parent::beforeSave();
    }

    public function behaviors() {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }

}
