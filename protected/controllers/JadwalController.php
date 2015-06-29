<?php

class JadwalController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'Matkul', 'Deskripsi', 'create2'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $daftarhadir = new BeritaAcaraDaftarHadir('search');
        $daftarhadir->unsetAttributes();  // clear any default values
        if (isset($_GET['BeritaAcaraDaftarHadir']))
            $daftarhadir->attributes = $_GET['BeritaAcaraDaftarHadir'];

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'daftarhadir' => $daftarhadir
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new Jadwal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Jadwal'])) {


            $model->attributes = $_POST['Jadwal'];

            //$sql = "SELECT nilai.NIM AS NIM,registrasi.SEM AS SEM FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$model->KODE_MK' AND registrasi.`TA` = '$model->TA' AND registrasi.`KELAS` LIKE '$model->KELAS'";
            $sql = "SELECT DISTINCT(nilai.NIM),nilai.`SEM` FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$model->KODE_MK' AND registrasi.`TA` = $model->TA AND registrasi.`KELAS` LIKE '$model->KELAS'";
            $list = Yii::app()->db->createCommand($sql)->queryAll();

            foreach ($list as $s) {

                $daftarhadir = new BeritaAcaraDaftarHadir;
                $daftarhadir->ID_KUR = $model->ID_KUR;
                $daftarhadir->KODE_MK = $model->KODE_MK;
                $daftarhadir->NIM = $s['NIM'];
                $daftarhadir->SEM = $s['SEM'];
                $daftarhadir->SESSION = $model->SESSION;
                $daftarhadir->WEEK = $model->WEEK;
                $daftarhadir->TA = $model->TA;
                $daftarhadir->KELAS = $model->KELAS;
                $daftarhadir->START_TIME = $this->start_time($daftarhadir->SESSION);
                $daftarhadir->END_TIME = $this->end_time($daftarhadir->SESSION);
                $daftarhadir->TANGGAL = $model->TANGGAL;

                if ($daftarhadir->validate()) {
                    $daftarhadir->save();
                } else {
                    echo CHtml::errorSummary($daftarhadir);
                }
            }

            $kuliah = new BeritaAcaraKuliah;
            $kuliah->WEEK = $model->WEEK;
            $kuliah->SESSION = $model->SESSION;
            $kuliah->TA = $model->TA;
            $kuliah->ID_KUR = $model->ID_KUR;
            $kuliah->KODE_MK = $model->KODE_MK;
            $kuliah->KELAS = $model->KELAS;
            $kuliah->TANGGAL = $model->TANGGAL;
            $kuliah->START_TIME = $this->start_time($model->SESSION);
            $kuliah->END_TIME = $this->end_time($model->SESSION);
            $kuliah->TOPIK = $model->TOPIK;
            $kuliah->RUANGAN = $model->RUANGAN;
            $kuliah->AKTIFITAS = $model->AKTIFITAS;
            $kuliah->PIC = $model->PIC;
            $kuliah->SEM = $list[0]['SEM'];
            $kuliah->TIPE_KULIAH = 1;
            $kuliah->METODE = $model->METODE;
            $kuliah->ALAT_BANTU = $model->ALAT_BANTU;


            if ($kuliah->validate()) {
                $kuliah->save();
            } else {
                echo CHtml::errorSummary($kuliah);
            }

            $model->START_TIME = $kuliah->START_TIME;
            $model->END_TIME = $kuliah->END_TIME;
            $model->save();
            Yii::app()->user->setFlash('success', 'Data berhasil di simpan');
            $this->redirect(array('View', 'id' => $model->ID)); // dirender ke file view
            //$this->redirect(array('view', 'id' => $model->ID));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreate2() {

        $model = new Jadwal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Jadwal'])) {


            $model->attributes = $_POST['Jadwal'];

            //$sql = "SELECT nilai.NIM AS NIM,registrasi.SEM AS SEM FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$model->KODE_MK' AND registrasi.`TA` = '$model->TA' AND registrasi.`KELAS` LIKE '$model->KELAS'";
            $sql = "SELECT DISTINCT(nilai.NIM),nilai.`SEM` FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$model->KODE_MK' AND registrasi.`TA` = $model->TA AND registrasi.`KELAS` LIKE '$model->KELAS'";
            $list = Yii::app()->db->createCommand($sql)->queryAll();

            $sql_pengajar = "SELECT * FROM pengajar WHERE TA LIKE '$model->TA' AND ID_KUR LIKE '$model->ID_KUR' AND KODE_MK LIKE '$model->KODE_MK' ORDER BY ROLE ASC";
            $list_pengajar = Yii::app()->db->createCommand($sql_pengajar)->queryAll();

            $model->PIC = $list_pengajar[0]['DOSEN_ID'];

            foreach ($list as $s) {

                $daftarhadir = new BeritaAcaraDaftarHadir;
                $daftarhadir->ID_KUR = $model->ID_KUR;
                $daftarhadir->KODE_MK = $model->KODE_MK;
                $daftarhadir->NIM = $s['NIM'];
                $daftarhadir->SEM = $s['SEM'];
                $daftarhadir->SESSION = $model->SESSION;
                $daftarhadir->WEEK = $model->WEEK;
                $daftarhadir->TA = $model->TA;
                $daftarhadir->KELAS = $model->KELAS;
                $daftarhadir->START_TIME = $this->start_time($daftarhadir->SESSION);
                $daftarhadir->END_TIME = $this->end_time($daftarhadir->SESSION);
                $daftarhadir->TANGGAL = $model->TANGGAL;

                if ($daftarhadir->validate()) {
                    $daftarhadir->save();
                } else {
                    echo CHtml::errorSummary($daftarhadir);
                }
            }

            $kuliah = new BeritaAcaraKuliah;
            $kuliah->WEEK = $model->WEEK;
            $kuliah->SESSION = $model->SESSION;
            $kuliah->TA = $model->TA;
            $kuliah->ID_KUR = $model->ID_KUR;
            $kuliah->KODE_MK = $model->KODE_MK;
            $kuliah->KELAS = $model->KELAS;
            $kuliah->TANGGAL = $model->TANGGAL;
            $kuliah->START_TIME = $this->start_time($model->SESSION);
            $kuliah->END_TIME = $this->end_time($model->SESSION);
            $kuliah->TOPIK = $model->TOPIK;
            $kuliah->RUANGAN = $model->RUANGAN;
            $kuliah->AKTIFITAS = $model->AKTIFITAS;
            $kuliah->PIC = $model->PIC;
            $kuliah->SEM = $list[0]['SEM'];
            $kuliah->TIPE_KULIAH = 1;
            $kuliah->METODE = $model->METODE;
            $kuliah->ALAT_BANTU = $model->ALAT_BANTU;


            if ($kuliah->validate()) {
                $kuliah->save();
            } else {
                echo CHtml::errorSummary($kuliah);
            }

            $model->START_TIME = $kuliah->START_TIME;
            $model->END_TIME = $kuliah->END_TIME;
            $model->save();
            $this->redirect(array('view', 'id' => $model->ID));
        }

        $this->render('create2', array(
            'model' => $model,
        ));
    }

    public function actionCek() {
        $model = new Jadwal;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Jadwal'])) {
            $model->attributes = $_POST['Jadwal'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ID));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Jadwal'])) {
            $criteria = new CDbCriteria;
            $criteria->addCondition("WEEK = '$model->WEEK'");
            $criteria->addCondition("TANGGAL = '$model->TANGGAL'");
            $criteria->addCondition("TA = '$model->TA'");
            $criteria->addCondition("ID_KUR = '$model->ID_KUR'");
            $criteria->addCondition("KODE_MK = '$model->KODE_MK'");

            $daftarhadir = BeritaAcaraDaftarHadir::model()->findAll($criteria);

            $criteria1 = new CDbCriteria;
            $criteria1->addCondition("WEEK = '$model->WEEK'");
            $criteria1->addCondition("TANGGAL = '$model->TANGGAL'");
            $criteria1->addCondition("TA = '$model->TA'");
            $criteria1->addCondition("ID_KUR = '$model->ID_KUR'");
            $criteria1->addCondition("KODE_MK = '$model->KODE_MK'");

            $acarakuliah = BeritaAcaraKuliah::model()->find($criteria);

            $model->attributes = $_POST['Jadwal'];

            $sql_pengajar = "SELECT * FROM pengajar WHERE TA LIKE '$model->TA' AND ID_KUR LIKE '$model->ID_KUR' AND KODE_MK LIKE '$model->KODE_MK' ORDER BY ROLE ASC";
            $list_pengajar = Yii::app()->db->createCommand($sql_pengajar)->queryAll();
            $model->PIC = $list_pengajar[0]['DOSEN_ID'];

            foreach ($daftarhadir as $s) {
                $s['WEEK'] = $model->WEEK;
                $s['TANGGAL'] = $model->TANGGAL;
                $s['SESSION'] = $model->SESSION;
                $s['START_TIME'] = $this->start_time($model->SESSION);
                $s['END_TIME'] = $this->end_time($model->SESSION);
                $s['TA'] = $model->TA;
                $s['ID_KUR'] = $model->ID_KUR;
                $s['KODE_MK'] = $model->KODE_MK;

                if ($s->validate()) {
                    $s->save();
                } else {
                    echo CHtml::errorSummary($daftarhadir);
                }
            }

            $acarakuliah->WEEK = $model->WEEK;
            $acarakuliah->SESSION = $model->SESSION;
            $acarakuliah->TA = $model->TA;
            $acarakuliah->ID_KUR = $model->ID_KUR;
            $acarakuliah->KODE_MK = $model->KODE_MK;
            $acarakuliah->KELAS = $model->KELAS;
            $acarakuliah->TANGGAL = $model->TANGGAL;
            $acarakuliah->START_TIME = $this->start_time($model->SESSION);
            $acarakuliah->END_TIME = $this->end_time($model->SESSION);
            $acarakuliah->RUANGAN = $model->RUANGAN;
            $acarakuliah->AKTIFITAS = $model->AKTIFITAS;
            $acarakuliah->PIC = $model->PIC;

            if ($acarakuliah->validate()) {
                $acarakuliah->save();
            } else {
                echo CHtml::errorSummary($acarakuliah);
            }

            if ($model->validate()) {
                $model->save();
            } else {
                echo CHtml::errorSummary($model);
            }


            $this->redirect(array('view', 'id' => $model->ID));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('Jadwal');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));

        $model = new Jadwal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Jadwal']))
            $model->attributes = $_GET['Jadwal'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Jadwal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Jadwal']))
            $model->attributes = $_GET['Jadwal'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Jadwal::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'jadwal-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function start_time($session) {
        switch ($session) {
            case 1:
                return "08:00:00";
                break;
            case 2:
                return "09:00:00";
                break;
            case 3:
                return "10:00:00";
                break;
            case 4:
                return "11:00:00";
                break;
            case 5:
                return "13:00:00";
                break;
            case 6:
                return "14:00:00";
                break;
            case 7:
                return "15:00:00";
                break;
            case 8:
                return "16:00:00";
                break;
        }
    }

    public function end_time($session) {
        switch ($session) {
            case 1:
                return "09:00:00";
                break;
            case 2:
                return "10:00:00";
                break;
            case 3:
                return "11:00:00";
                break;
            case 4:
                return "13:00:00";
                break;
            case 5:
                return "14:00:00";
                break;
            case 6:
                return "15:00:00";
                break;
            case 7:
                return "16:00:00";
                break;
            case 8:
                return "17:00:00";
                break;
        }
    }

    public function actionMatkul() {

        $data = Kurikulum::model()->findAll(
                'ID_KUR=:id', array(':id' => (int) $_POST['Jadwal']['ID_KUR']));

        $return = CHtml::listData($data, 'KODE_MK', 'KODE_MK');


        foreach ($return as $value => $KODE_MK) {
            echo Chtml::tag('option', array('value' => $value), CHtml::encode($KODE_MK), true);
        }

        echo Chtml::tag('option', array('value' => 'Kosong1'), CHtml::encode('Free'));
    }

    public function actionDeskripsi() {

        $matkul = $_POST['Jadwal']['KODE_MK'];
        $sql = "SELECT * FROM kurikulum WHERE KODE_MK LIKE '$matkul'";

        $list = Yii::app()->db->createCommand($sql)->queryAll();
        echo $list[0]['NAMA_KUL_IND'];
    }

}
