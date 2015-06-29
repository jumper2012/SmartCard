<?php

class BeritaAcaraKuliahController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'AdminByDate', 'CetakBeritaAcaraKuliah', 'IndexData', 'CetakBeritaAcaraKuliahPdf'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new BeritaAcaraKuliah;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BeritaAcaraKuliah'])) {
            $model->attributes = $_POST['BeritaAcaraKuliah'];
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

        if (isset($_POST['BeritaAcaraKuliah'])) {
            $model->attributes = $_POST['BeritaAcaraKuliah'];
            if ($model->save())
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
        $dataProvider = new CActiveDataProvider('BeritaAcaraKuliah');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BeritaAcaraKuliah('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BeritaAcaraKuliah']))
            $model->attributes = $_GET['BeritaAcaraKuliah'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminByDate($id) {
        //$tanggal = date("Y-m-d");
        $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array(
            'criteria' => array(
                'join' => "JOIN d_jadwal dj ON t.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID",
                'condition' => 'mj.TANGGAL like "%' . $id . '%"',
            ),
        ));
//        $criteria = new CDbCriteria;
//        $criteria->condition = 'TANGGAL like "%' . $id . '%"';
//        $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array('criteria' => $criteria));
        $this->render('adminyDate', array(
            'dataProvider' => $gridDataProvider, 'wew' => $id,
        ));
    }

    public function actionCetakBeritaAcaraKuliah() {
        $model = new BeritaAcaraKuliah;
        $djadwal = new DJadwal;
        $mjadwal = new MJadwal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $TA_form = "";
        $KODE_MK_form = "";
        $Kelas_form = "";
        $Sem = "";
        if (isset($_POST['BeritaAcaraKuliah']) || isset($_POST['DJadwal']) || isset($_POST['MJadwal'])) {
            //$model->attributes = $_POST['BeritaAcaraKuliah'];
            $TA_form = $_POST['MJadwal']['TA'];
            $KODE_MK_form = $_POST['DJadwal']['KODE_MK'];
            $Kelas_form = $_POST['MJadwal']['KELAS'];
            $id = $TA_form . "-" . $KODE_MK_form . "-" . $Kelas_form;
            $hasil = BeritaAcaraKuliah::model()->findAllBySql(" SELECT * FROM berita_acara_kuliah bak JOIN d_jadwal dj ON bak.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA_form' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form'");
            if ($hasil)
                $this->redirect(array('IndexData', 'id' => $id));
        }
        $this->render('createBeritaAcaraKuliah', array(
            'model' => $model,
            'djadwal' => $djadwal,
            'mjadwal' => $mjadwal,
        ));
    }

    public function actionIndexData($id) {
        //$dataProvider = new CActiveDataProvider('BeritaAcaraKuliah');

        $this->render('IndexBeritaAcaraKuliah', array(
            'message' => $id,
        ));
    }

    public function actionCetakBeritaAcaraKuliahPdf($id) {
        $html2pdf = Yii::app()->pdf->HTML2PDF('P', array(210, 330), 'en', true, 'UTF-8', array(8, 8, 8, 8));
        $html2pdf->WriteHTML($this->renderPartial('CetakBeritaAcaraKuliah', array('message' => $id), true));
        ob_end_clean();
        $html2pdf->Output('BeritaAcaraKuliah_' . $id . '.pdf');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = BeritaAcaraKuliah::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'berita-acara-kuliah-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
