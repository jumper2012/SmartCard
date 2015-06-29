<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $ID
 * @property string $ACCOUNT
 * @property string $PASSWORD
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ACCOUNT', 'length', 'max'=>20),
			array('PASSWORD', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, ACCOUNT, PASSWORD', 'safe', 'on'=>'search'),
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
			'ACCOUNT' => 'Account',
			'PASSWORD' => 'Password',
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
		$criteria->compare('ACCOUNT',$this->ACCOUNT,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
             
        // overrides the CModel::beforeSave() 
    public function beforeSave() { 
        $this->PASSWORD = Yii::app()->digester->md5($this->PASSWORD); 
        return (parent::beforeSave()); 
    } 
 
    // to compare this model's password wirh a given password 
    public function comparePassword($_password) { 
        return($this->PASSWORD === Yii::app()->digester->md5($_password)); 
    }
        public static function validateChangePassword($pwd,$repwd){
            if($pwd===$repwd)
                return true;
            else
                return false;
        }

}