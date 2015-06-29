<?php

class MJadwalController extends Controller {

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
                'actions' => array('view', 'Matkul', 'Deskripsi'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'create', 'update', 'loadChildByAjax', 'create2', 'createjadwal', 'matkuljadwal', 'createexcel'),
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

        $detail = new DJadwal('search');
        $detail->unsetAttributes();  // clear any default values
        if (isset($_GET['DJadwal'
                ]))
            $daftarhadir->attributes = $_GET['DJadwal'];

        $model = $this->loadModel($id);
        $this->render('view', array(
            'model' => $model,
            'detail' => $detail->searchByIDJadwal($model->ID),
        ));
    }

    public function actionCreate2() {
        $kbk = RefKbk::model()->findAll();
        $jumlah = count($kbk);

        $this->render('create2', array('kbk' => $kbk, 'jumlah' => $jumlah));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new MJadwal;
        $djadwal = new DJadwal;
// Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MJadwal'])) {
            $model->attributes = $_POST['MJadwal'];

            if ($model->save()) {
                if (isset($_POST['DJadwal'])) {


                    for ($i = 0; $i < 8; $i++) {
                        if (!isset($_POST["formsesi$i"])) {
                            echo $i;
                            $detail = new DJadwal;
                            $detail->KODE_MK = $_POST['DJadwal'][$i]['KODE_MK'];
                            $detail->RUANGAN = $_POST['DJadwal'][$i]['RUANGAN'];
                            $detail->AKTIFITAS = $_POST['DJadwal'][$i]['AKTIFITAS'];

                            $detail->SESSION = $i + 1;
                            $detail->ID_JADWAL = $model->ID;
                            $detail->START_TIME = $this->start_time($i + 1);
                            $detail->END_TIME = $this->end_time($i + 1);
                            // MAHASISWA
                            $sql = "SELECT DISTINCT(nilai.NIM),nilai.`SEM` FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$detail->KODE_MK' AND registrasi.`TA` = $model->TA AND registrasi.`KELAS` LIKE '$model->KELAS'";
                            $list = Yii::app()->db->createCommand($sql)->queryAll();

                            //PENGAJAR
                            $sql_pengajar = "SELECT * FROM pengajar WHERE TA LIKE '$model->TA' AND ID_KUR LIKE '$model->ID_KUR' AND KODE_MK LIKE '$detail->KODE_MK' ORDER BY ROLE ASC";
                            $list_pengajar = Yii::app()->db->createCommand($sql_pengajar)->queryAll();

                            $detail->PIC = $list_pengajar[0]['DOSEN_ID'];

                            if ($detail->validate()) {
                                $detail->save();
                                foreach ($list as $s) {

                                    $daftarhadir = new BeritaAcaraDaftarHadir;
                                    $daftarhadir->ID_DETAIL_JADWAL = $detail->ID;
                                    $daftarhadir->NIM = $s['NIM'];

                                    if ($daftarhadir->validate()) {
                                        $daftarhadir->save();
                                    } else {
                                        echo CHtml::errorSummary($daftarhadir);
                                    }
                                }

                                $kuliah = new BeritaAcaraKuliah;
                                $kuliah->ID_DETAIL_JADWAL = $detail->ID;
                                $kuliah->TIPE_KULIAH = 1;

                                if ($kuliah->validate()) {
                                    $kuliah->save();
                                } else {
                                    echo CHtml::errorSummary($kuliah);
                                }
                            } else {
                                echo CHtml::errorSummary($detail);
                            }
                        }
                    }
                }
                $this->redirect(array('view', 'id' => $model->ID));
            } else {
                echo CHtml::errorSummary($model);
            }
        }

        $this->render('create', array(
            'model' => $model,
            'djadwal' => $djadwal
        ));
    }

    public function actionCreateexcel() {
        $model = new MJadwal;
        $djadwal = new DJadwal;
// Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MJadwal'])) {
            $model->attributes = $_POST['MJadwal'];

            if ($model->save()) {
                if (isset($_POST['DJadwal'])) {


                    for ($i = 0; $i < 8; $i++) {
                        if (!isset($_POST["formsesi$i"])) {
                            echo $i;
                            $detail = new DJadwal;
                            $detail->KODE_MK = $_POST['DJadwal'][$i]['KODE_MK'];
                            $detail->RUANGAN = $_POST['DJadwal'][$i]['RUANGAN'];
                            $detail->AKTIFITAS = $_POST['DJadwal'][$i]['AKTIFITAS'];

                            $detail->SESSION = $i + 1;
                            $detail->ID_JADWAL = $model->ID;
                            $detail->START_TIME = $this->start_time($i + 1);
                            $detail->END_TIME = $this->end_time($i + 1);
                            // MAHASISWA
                            $sql = "SELECT DISTINCT(nilai.NIM),nilai.`SEM` FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$detail->KODE_MK' AND registrasi.`TA` = $model->TA AND registrasi.`KELAS` LIKE '$model->KELAS'";
                            $list = Yii::app()->db->createCommand($sql)->queryAll();

                            //PENGAJAR
                            $sql_pengajar = "SELECT * FROM pengajar WHERE TA LIKE '$model->TA' AND ID_KUR LIKE '$model->ID_KUR' AND KODE_MK LIKE '$detail->KODE_MK' ORDER BY ROLE ASC";
                            $list_pengajar = Yii::app()->db->createCommand($sql_pengajar)->queryAll();

                            $detail->PIC = $list_pengajar[0]['DOSEN_ID'];

                            if ($detail->validate()) {
                                $detail->save();
                                foreach ($list as $s) {

                                    $daftarhadir = new BeritaAcaraDaftarHadir;
                                    $daftarhadir->ID_DETAIL_JADWAL = $detail->ID;
                                    $daftarhadir->NIM = $s['NIM'];

                                    if ($daftarhadir->validate()) {
                                        $daftarhadir->save();
                                    } else {
                                        echo CHtml::errorSummary($daftarhadir);
                                    }
                                }

                                $kuliah = new BeritaAcaraKuliah;
                                $kuliah->ID_DETAIL_JADWAL = $detail->ID;
                                $kuliah->TIPE_KULIAH = 1;

                                if ($kuliah->validate()) {
                                    $kuliah->save();
                                } else {
                                    echo CHtml::errorSummary($kuliah);
                                }
                            } else {
                                echo CHtml::errorSummary($detail);
                            }
                        }
                    }
                }
                $this->redirect(array('view', 'id' => $model->ID));
            } else {
                echo CHtml::errorSummary($model);
            }
        }

        $this->render('create', array(
            'model' => $model,
            'djadwal' => $djadwal
        ));
    }

    public function actionCreatejadwal($kbk) {
        $model = new MJadwal;
        $djadwal = new DJadwal;
        $kbkmodel = RefKbk::model()->findByPk($kbk);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MJadwal'])) {
            $model->attributes = $_POST['MJadwal'];

            if ($model->save()) {
                if (isset($_POST['DJadwal'])) {

                    for ($i = 0; $i < 8; $i++) {
                        if (!isset($_POST["formsesi$i"])) {
                            echo $i;
                            $detail = new
                                    DJadwal;
                            $detail->KODE_MK = $_POST['DJadwal'][$i]['KODE_MK'];
                            $detail->RUANGAN = $_POST['DJadwal'][$i]['RUANGAN'];
                            $detail->AKTIFITAS = $_POST['DJadwal'][$i]['AKTIFITAS'];

                            $detail->SESSION = $i + 1;
                            $detail->ID_JADWAL = $model->ID;

                            $detail->START_TIME = $this->start_time($i + 1);
                            $detail->END_TIME = $this->end_time($i + 1);
// MAHASISWA
                            $sql = "SELECT DISTINCT(nilai.NIM),nilai.`SEM` FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE 
'$detail->KODE_MK' AND registrasi.`TA` = $model->TA AND registrasi.`KELAS` LIKE '$model->KELAS'";
                            $list = Yii::app()->db->createCommand($sql)->queryAll();

//PENGAJAR
                            $sql_pengajar = "SELECT * FROM pengajar WHERE TA LIKE '$model->TA' AND ID_KUR LIKE '$model->ID_KUR' AND KODE_MK LIKE '$detail->KODE_MK' ORDER BY ROLE ASC";
                            $list_pengajar = Yii::app()->db->createCommand($sql_pengajar)->queryAll();

                            $detail->PIC = $list_pengajar[0]['DOSEN_ID'];

                            if ($detail->validate()) {
                                $detail->save();
                                foreach ($list as $s) {

                                    $daftarhadir = new BeritaAcaraDaftarHadir;
                                    $daftarhadir->ID_DETAIL_JADWAL = $detail->ID;
                                    $daftarhadir->NIM = $s['NIM'];

                                    if ($daftarhadir->validate()) {
                                        $daftarhadir->save();
                                    } else {
                                        echo CHtml::errorSummary($daftarhadir);
                                    }
                                }

                                $kuliah = new BeritaAcaraKuliah;
                                $kuliah->ID_DETAIL_JADWAL = $detail->ID;
                                $kuliah->TIPE_KULIAH = 1;

                                if ($kuliah->validate()) {
                                    $kuliah->save();
                                } else {
                                    echo CHtml::errorSummary($kuliah);
                                }
                            } else {
                                echo CHtml::errorSummary($detail);
                            }
                        }
                    }
                }
                $this->redirect(array('view', 'id' => $model->ID));
            } else {
                echo CHtml::errorSummary($model);
            }
        }

        $this->render('createjadwal', array(
            'model' => $model,
            'djadwal' => $djadwal,
            'kbk' => $kbkmodel
                ,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $djadwal = DJadwal::model()->findAllByAttributes(array('ID_JADWAL' => $id));

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MJadwal'])) {
            $model->attributes = $_POST['MJadwal'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ID));
        }

        $this->render('update', array(
            'model' => $model,
            'djadwal' => $djadwal
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param int eger $id t he ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] :
                                array
                            ('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $model = new MJadwal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET[
                        'MJadwal']))
            $model->attributes = $_GET['MJadwal'];

        $this->render('index', array
            (
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new MJadwal
                ('search');
        $model->unsetAttributes();  // clear any default values


        if (isset($_GET['MJadwal']))
            $model->attributes = $_GET['MJadwal']

            ;

        $this->render('admin', array('model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = MJadwal::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST[
                        'ajax']) && $_POST['ajax'] === 'mjadwal-form') {
            echo CActiveForm::validate(
                    $model);
            Yii:: app()->end();
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
                'ID_KUR=:id', array(':id' => (int) $_POST['MJadwal']['ID_KUR']));

        $return = CHtml::listData($data, 'KODE_MK', 'KODE_MK');


        foreach ($return as $value => $KODE_MK) {
            echo Chtml::tag('option', array('value' => $value), CHtml::encode($KODE_MK), true);
        }

        echo Chtml::tag('option', array('value' => 'Kosong'), CHtml::encode('Free'));
    }

    public function actionMatkuljadwal($kbk) {
        $id_kur = (int) $_POST['MJadwal']['ID_KUR'];

        $kuliah = CHtml::listData(Kurikulum::model()->findAll(array(
                            'condition' => "ID_KUR = '$id_kur' AND (KBK_ID LIKE '$kbk' OR KBK_ID LIKE 'all')",)), 'KODE_MK', 'KODE_MK');


//        $kurikulum = Kurikulum::model()->findAllByAttributes(array('ID_KUR' => $id_kur));
//        $data = Kurikulum::model()->findAll(
//                "ID_KUR=:id ", array(':id' => (int) $_POST['MJadwal']['ID_KUR']));
//        $return = CHtml::listData($kuliah, 'KODE_MK', 'KODE_MK');


        foreach ($kuliah as $value => $KODE_MK) {
            echo Chtml::tag('option', array('value' => $value), CHtml::encode($KODE_MK), true);
        }

        echo Chtml::tag('option', array('value' => 'Kosong'), CHtml::encode('Free'));
    }

    public function actionDeskripsi($id) {

        $matkul = $_POST['DJadwal'][$id]['KODE_MK'];
        $sql = "SELECT * FROM kurikulum WHERE KODE_MK LIKE '$matkul'";

        $list = Yii::app()->db->createCommand($sql)->queryAll();
        echo $list[0]['NAMA_KUL_IND'] . "&nbsp(" . $list[0]['SHORT_NAME'] . ")";
    }

    public function actionLoadChildByAjax($index) {
        $model = new DJadwal;
        $this->renderPartial('/dJadwal/_form', array(
            'model' => $model,
            'index' => $index,
//            'display' => 'block',
                ), false, true);
    }

}
