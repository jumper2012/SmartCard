<?php

/**
 * This is the model class for table "ref_kbk".
 *
 * The followings are the available columns in table 'ref_kbk':
 * @property string $KBK_ID
 * @property string $KPT_ID
 * @property string $JENJANG
 * @property string $KBK_IND
 * @property string $KBK_ING
 * @property string $NAMA_KOPERTIS_IND
 * @property string $NAMA_KOPERTIS_ING
 * @property string $SHORT_DESC_IND
 * @property string $SHORT_DESC_ING
 * @property string $DESC_IND
 * @property string $DESC_ING
 * @property integer $STATUS
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 */
class RefKbk extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RefKbk the static model class
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
		return 'ref_kbk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JENJANG, LAST_UPDATE', 'required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('KBK_ID, JENJANG', 'length', 'max'=>20),
			array('KPT_ID', 'length', 'max'=>10),
			array('KBK_IND, KBK_ING', 'length', 'max'=>100),
			array('NAMA_KOPERTIS_IND, NAMA_KOPERTIS_ING, SHORT_DESC_IND, SHORT_DESC_ING', 'length', 'max'=>255),
			array('USER_ID, WS', 'length', 'max'=>15),
			array('DESC_IND, DESC_ING', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('KBK_ID, KPT_ID, JENJANG, KBK_IND, KBK_ING, NAMA_KOPERTIS_IND, NAMA_KOPERTIS_ING, SHORT_DESC_IND, SHORT_DESC_ING, DESC_IND, DESC_ING, STATUS, LAST_UPDATE, USER_ID, WS', 'safe', 'on'=>'search'),
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
			'KBK_ID' => 'Kbk',
			'KPT_ID' => 'Kpt',
			'JENJANG' => 'Jenjang',
			'KBK_IND' => 'Kbk Ind',
			'KBK_ING' => 'Kbk Ing',
			'NAMA_KOPERTIS_IND' => 'Nama Kopertis Ind',
			'NAMA_KOPERTIS_ING' => 'Nama Kopertis Ing',
			'SHORT_DESC_IND' => 'Short Desc Ind',
			'SHORT_DESC_ING' => 'Short Desc Ing',
			'DESC_IND' => 'Desc Ind',
			'DESC_ING' => 'Desc Ing',
			'STATUS' => 'Status',
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

		$criteria->compare('KBK_ID',$this->KBK_ID,true);
		$criteria->compare('KPT_ID',$this->KPT_ID,true);
		$criteria->compare('JENJANG',$this->JENJANG,true);
		$criteria->compare('KBK_IND',$this->KBK_IND,true);
		$criteria->compare('KBK_ING',$this->KBK_ING,true);
		$criteria->compare('NAMA_KOPERTIS_IND',$this->NAMA_KOPERTIS_IND,true);
		$criteria->compare('NAMA_KOPERTIS_ING',$this->NAMA_KOPERTIS_ING,true);
		$criteria->compare('SHORT_DESC_IND',$this->SHORT_DESC_IND,true);
		$criteria->compare('SHORT_DESC_ING',$this->SHORT_DESC_ING,true);
		$criteria->compare('DESC_IND',$this->DESC_IND,true);
		$criteria->compare('DESC_ING',$this->DESC_ING,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}