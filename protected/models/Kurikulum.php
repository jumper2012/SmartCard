<?php

/**
 * This is the model class for table "kurikulum".
 *
 * The followings are the available columns in table 'kurikulum':
 * @property integer $ID_KUR
 * @property string $KODE_MK
 * @property string $NAMA_KUL_IND
 * @property string $NAMA_KUL_ING
 * @property string $SHORT_NAME
 * @property string $KBK_ID
 * @property string $COURSE_GROUP
 * @property integer $SKS
 * @property integer $SEM
 * @property integer $URUT_DLM_SEM
 * @property integer $SIFAT
 * @property string $KEY_TOPICS_IND
 * @property string $KEY_TOPICS_ING
 * @property string $OBJEKTIF_IND
 * @property string $OBJEKTIF_ING
 * @property integer $LAB_HOUR
 * @property integer $TUTORIAL_HOUR
 * @property integer $COURSE_HOUR
 * @property integer $COURSE_HOUR_IN_WEEK
 * @property integer $LAB_HOUR_IN_WEEK
 * @property integer $NUMBER_WEEK
 * @property string $OTHER_ACTIVITY
 * @property integer $OTHER_ACTIVITY_HOUR
 * @property integer $KNOWLEDGE
 * @property integer $SKILL
 * @property integer $ATTITUDE
 * @property integer $UTS
 * @property integer $UAS
 * @property integer $TUGAS
 * @property integer $QUIZ
 * @property string $WHITEBOARD
 * @property string $LCD
 * @property string $COURSEWARE
 * @property string $LAB
 * @property string $ELEARNING
 * @property integer $STATUS
 * @property string $LAST_UPDATE
 * @property string $USER_ID
 * @property string $WS
 * @property string $PREREQUISITES
 * @property string $COURSE_DESCRIPTION
 * @property string $COURSE_OBJECTIVES
 * @property string $LEARNING_OUTCOMES
 * @property string $COURSE_FORMAT
 * @property string $GRADING_PROCEDURE
 * @property string $COURSE_CONTENT
 *
 * The followings are the available model relations:
 * @property BeritaAcaraDaftarHadir[] $beritaAcaraDaftarHadirs
 * @property BeritaAcaraDaftarHadir[] $beritaAcaraDaftarHadirs1
 * @property BeritaAcaraKuliah[] $beritaAcaraKuliahs
 * @property Jadwal[] $jadwals
 * @property Jadwal[] $jadwals1
 */
class Kurikulum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kurikulum the static model class
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
		return 'kurikulum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KODE_MK', 'required'),
			array('ID_KUR, SKS, SEM, URUT_DLM_SEM, SIFAT, LAB_HOUR, TUTORIAL_HOUR, COURSE_HOUR, COURSE_HOUR_IN_WEEK, LAB_HOUR_IN_WEEK, NUMBER_WEEK, OTHER_ACTIVITY_HOUR, KNOWLEDGE, SKILL, ATTITUDE, UTS, UAS, TUGAS, QUIZ, STATUS', 'numerical', 'integerOnly'=>true),
			array('KODE_MK', 'length', 'max'=>8),
			array('NAMA_KUL_IND, NAMA_KUL_ING', 'length', 'max'=>255),
			array('SHORT_NAME, KBK_ID, COURSE_GROUP, LAST_UPDATE', 'length', 'max'=>20),
			array('OTHER_ACTIVITY', 'length', 'max'=>50),
			array('WHITEBOARD, LCD, COURSEWARE, LAB, ELEARNING', 'length', 'max'=>1),
			array('USER_ID, WS', 'length', 'max'=>15),
			array('KEY_TOPICS_IND, KEY_TOPICS_ING, OBJEKTIF_IND, OBJEKTIF_ING, PREREQUISITES, COURSE_DESCRIPTION, COURSE_OBJECTIVES, LEARNING_OUTCOMES, COURSE_FORMAT, GRADING_PROCEDURE, COURSE_CONTENT', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_KUR, KODE_MK, NAMA_KUL_IND, NAMA_KUL_ING, SHORT_NAME, KBK_ID, COURSE_GROUP, SKS, SEM, URUT_DLM_SEM, SIFAT, KEY_TOPICS_IND, KEY_TOPICS_ING, OBJEKTIF_IND, OBJEKTIF_ING, LAB_HOUR, TUTORIAL_HOUR, COURSE_HOUR, COURSE_HOUR_IN_WEEK, LAB_HOUR_IN_WEEK, NUMBER_WEEK, OTHER_ACTIVITY, OTHER_ACTIVITY_HOUR, KNOWLEDGE, SKILL, ATTITUDE, UTS, UAS, TUGAS, QUIZ, WHITEBOARD, LCD, COURSEWARE, LAB, ELEARNING, STATUS, LAST_UPDATE, USER_ID, WS, PREREQUISITES, COURSE_DESCRIPTION, COURSE_OBJECTIVES, LEARNING_OUTCOMES, COURSE_FORMAT, GRADING_PROCEDURE, COURSE_CONTENT', 'safe', 'on'=>'search'),
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
			'beritaAcaraDaftarHadirs' => array(self::HAS_MANY, 'BeritaAcaraDaftarHadir', 'KODE_MK'),
			'beritaAcaraDaftarHadirs1' => array(self::HAS_MANY, 'BeritaAcaraDaftarHadir', 'ID_KUR'),
			'beritaAcaraKuliahs' => array(self::HAS_MANY, 'BeritaAcaraKuliah', 'KODE_MK'),
			'jadwals' => array(self::HAS_MANY, 'Jadwal', 'ID_KUR'),
			'jadwals1' => array(self::HAS_MANY, 'Jadwal', 'KODE_MK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_KUR' => 'Id Kur',
			'KODE_MK' => 'Kode Mk',
			'NAMA_KUL_IND' => 'Nama Kul Ind',
			'NAMA_KUL_ING' => 'Nama Kul Ing',
			'SHORT_NAME' => 'Short Name',
			'KBK_ID' => 'Kbk',
			'COURSE_GROUP' => 'Course Group',
			'SKS' => 'Sks',
			'SEM' => 'Sem',
			'URUT_DLM_SEM' => 'Urut Dlm Sem',
			'SIFAT' => 'Sifat',
			'KEY_TOPICS_IND' => 'Key Topics Ind',
			'KEY_TOPICS_ING' => 'Key Topics Ing',
			'OBJEKTIF_IND' => 'Objektif Ind',
			'OBJEKTIF_ING' => 'Objektif Ing',
			'LAB_HOUR' => 'Lab Hour',
			'TUTORIAL_HOUR' => 'Tutorial Hour',
			'COURSE_HOUR' => 'Course Hour',
			'COURSE_HOUR_IN_WEEK' => 'Course Hour In Week',
			'LAB_HOUR_IN_WEEK' => 'Lab Hour In Week',
			'NUMBER_WEEK' => 'Number Week',
			'OTHER_ACTIVITY' => 'Other Activity',
			'OTHER_ACTIVITY_HOUR' => 'Other Activity Hour',
			'KNOWLEDGE' => 'Knowledge',
			'SKILL' => 'Skill',
			'ATTITUDE' => 'Attitude',
			'UTS' => 'Uts',
			'UAS' => 'Uas',
			'TUGAS' => 'Tugas',
			'QUIZ' => 'Quiz',
			'WHITEBOARD' => 'Whiteboard',
			'LCD' => 'Lcd',
			'COURSEWARE' => 'Courseware',
			'LAB' => 'Lab',
			'ELEARNING' => 'Elearning',
			'STATUS' => 'Status',
			'LAST_UPDATE' => 'Last Update',
			'USER_ID' => 'User',
			'WS' => 'Ws',
			'PREREQUISITES' => 'Prerequisites',
			'COURSE_DESCRIPTION' => 'Course Description',
			'COURSE_OBJECTIVES' => 'Course Objectives',
			'LEARNING_OUTCOMES' => 'Learning Outcomes',
			'COURSE_FORMAT' => 'Course Format',
			'GRADING_PROCEDURE' => 'Grading Procedure',
			'COURSE_CONTENT' => 'Course Content',
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

		$criteria->compare('ID_KUR',$this->ID_KUR);
		$criteria->compare('KODE_MK',$this->KODE_MK,true);
		$criteria->compare('NAMA_KUL_IND',$this->NAMA_KUL_IND,true);
		$criteria->compare('NAMA_KUL_ING',$this->NAMA_KUL_ING,true);
		$criteria->compare('SHORT_NAME',$this->SHORT_NAME,true);
		$criteria->compare('KBK_ID',$this->KBK_ID,true);
		$criteria->compare('COURSE_GROUP',$this->COURSE_GROUP,true);
		$criteria->compare('SKS',$this->SKS);
		$criteria->compare('SEM',$this->SEM);
		$criteria->compare('URUT_DLM_SEM',$this->URUT_DLM_SEM);
		$criteria->compare('SIFAT',$this->SIFAT);
		$criteria->compare('KEY_TOPICS_IND',$this->KEY_TOPICS_IND,true);
		$criteria->compare('KEY_TOPICS_ING',$this->KEY_TOPICS_ING,true);
		$criteria->compare('OBJEKTIF_IND',$this->OBJEKTIF_IND,true);
		$criteria->compare('OBJEKTIF_ING',$this->OBJEKTIF_ING,true);
		$criteria->compare('LAB_HOUR',$this->LAB_HOUR);
		$criteria->compare('TUTORIAL_HOUR',$this->TUTORIAL_HOUR);
		$criteria->compare('COURSE_HOUR',$this->COURSE_HOUR);
		$criteria->compare('COURSE_HOUR_IN_WEEK',$this->COURSE_HOUR_IN_WEEK);
		$criteria->compare('LAB_HOUR_IN_WEEK',$this->LAB_HOUR_IN_WEEK);
		$criteria->compare('NUMBER_WEEK',$this->NUMBER_WEEK);
		$criteria->compare('OTHER_ACTIVITY',$this->OTHER_ACTIVITY,true);
		$criteria->compare('OTHER_ACTIVITY_HOUR',$this->OTHER_ACTIVITY_HOUR);
		$criteria->compare('KNOWLEDGE',$this->KNOWLEDGE);
		$criteria->compare('SKILL',$this->SKILL);
		$criteria->compare('ATTITUDE',$this->ATTITUDE);
		$criteria->compare('UTS',$this->UTS);
		$criteria->compare('UAS',$this->UAS);
		$criteria->compare('TUGAS',$this->TUGAS);
		$criteria->compare('QUIZ',$this->QUIZ);
		$criteria->compare('WHITEBOARD',$this->WHITEBOARD,true);
		$criteria->compare('LCD',$this->LCD,true);
		$criteria->compare('COURSEWARE',$this->COURSEWARE,true);
		$criteria->compare('LAB',$this->LAB,true);
		$criteria->compare('ELEARNING',$this->ELEARNING,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('WS',$this->WS,true);
		$criteria->compare('PREREQUISITES',$this->PREREQUISITES,true);
		$criteria->compare('COURSE_DESCRIPTION',$this->COURSE_DESCRIPTION,true);
		$criteria->compare('COURSE_OBJECTIVES',$this->COURSE_OBJECTIVES,true);
		$criteria->compare('LEARNING_OUTCOMES',$this->LEARNING_OUTCOMES,true);
		$criteria->compare('COURSE_FORMAT',$this->COURSE_FORMAT,true);
		$criteria->compare('GRADING_PROCEDURE',$this->GRADING_PROCEDURE,true);
		$criteria->compare('COURSE_CONTENT',$this->COURSE_CONTENT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}