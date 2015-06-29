<?php

class BeritaAcaraDaftarHadirController extends Controller {

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

    public function actionsearchGrafikBeritaAcaraDaftarHadir()
    {
        $model = new BeritaAcaraDaftarHadir;
        $djadwal = new DJadwal;
        $mjadwal = new MJadwal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $KODE_MK_form = "";
        $Sem = "";
        $Kelas_form = "";
        $T_A = "";
        if (isset($_POST['BeritaAcaraDaftarHadir']) || isset($_POST['DJadwal']) || isset($_POST['MJadwal'])) {
            //$model->attributes = $_POST['BeritaAcaraKuliah'];
            $KODE_MK_form = $_POST['DJadwal']['KODE_MK'];
            $Kelas_form = $_POST['MJadwal']['KELAS'];
            $T_A = $_POST['MJadwal']['TA'];
            $id = $KODE_MK_form . "-" . $Kelas_form . "-" . $T_A;
            $hasil = BeritaAcaraDaftarHadir::model()->findAllBySql(" SELECT * FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form'");
            $hadir = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form' AND STATUS LIKE 'H'")->queryAll();
            $absen = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form' AND STATUS LIKE 'A'")->queryAll();
            $jmlHadir = 0;
            foreach ($hadir as $item) {
                $jmlHadir = $item['COUNT(*)'];
            }
            $jmlabsen = 0;
            foreach ($absen as $item) {
                $jmlabsen = $item['COUNT(*)'];
            }

            if ($hasil)
                $tanggal = date('Y-m-d');
                $this->redirect(array('IndexGrafikData', 'id' => $id, 'tanggal'=>$tanggal));
        }

        $this->render('SearcHDaftarHadir', array(
            'model' => $model,
            'djadwal' => $djadwal,
            'mjadwal' => $mjadwal,
        ));
    }
    
    public function actionIndexGrafikData($id, $tanggal) {
        $model = new MJadwal();
        if (isset($_POST['MJadwal'])) { 
            $model->attributes = $_POST['MJadwal'];
<<<<<<< HEAD
            echo $_POST['MJadwal']->tgl;
=======
>>>>>>> 983b2a13e73747ffb52fffcc3e4a7ad6aa5a75a4
            $tempTanggal = explode("/", $model->TANGGAL);
            $tanggal = $tempTanggal[2]."-".$tempTanggal[0]."-".$tempTanggal[1];
            $id = Yii::app()->session['var']; // Prints "value"
            $this->redirect(array('IndexGrafikData', 'id' => $id, 'tanggal'=>$tanggal));
        }
        $this->render('IndexDataSearchGrafik', array(
            'message' => $id, 'message2' =>$tanggal, 'model' => $model,
        ));
    }
<<<<<<< HEAD
    
=======

>>>>>>> 983b2a13e73747ffb52fffcc3e4a7ad6aa5a75a4
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'validate'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'searchBeritaAcaraDaftarHadir', 'IndexData', 'CetakLaporan', 'searchGrafikBeritaAcaraDaftarHadir', 'IndexGrafikData', 'searchGrafikDaftarHadirMahasiswa', 'IndexGrafikDataMahasiswa', 'absen', 'daftarhadir'),
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
        $model = new BeritaAcaraDaftarHadir;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BeritaAcaraDaftarHadir'])) {
            $model->attributes = $_POST['BeritaAcaraDaftarHadir'];
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

        if (isset($_POST['BeritaAcaraDaftarHadir'])) {
            $model->attributes = $_POST['BeritaAcaraDaftarHadir'];
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

    public function actionCetakLaporan($id) {
        $html2pdf = Yii::app()->pdf->HTML2PDF('L', array(210, 330), 'en', true, 'UTF-8', array(15, 10, 10, 10));
        $message = $id;
        $html2pdf->WriteHTML($this->renderPartial('LaporanBeritaAcaraKuliah', array('message' => $message), true));
        ob_end_clean();
        $html2pdf->Output('BeritaAcaraDH_' . $id . '.pdf');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('BeritaAcaraDaftarHadir');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BeritaAcaraDaftarHadir('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BeritaAcaraDaftarHadir']))
            $model->attributes = $_GET['BeritaAcaraDaftarHadir'];

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
        $model = BeritaAcaraDaftarHadir::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionsearchBeritaAcaraDaftarHadir() {
        $model = new BeritaAcaraDaftarHadir;
        $djadwal = new DJadwal;
        $mjadwal = new MJadwal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $KODE_MK_form = "";
        $Sem = "";
        $Kelas_form = "";
        $T_A = "";
        if (isset($_POST['BeritaAcaraDaftarHadir']) || isset($_POST['DJadwal']) || isset($_POST['MJadwal'])) {
            //$model->attributes = $_POST['BeritaAcaraKuliah'];
            $KODE_MK_form = $_POST['DJadwal']['KODE_MK'];
            $Kelas_form = $_POST['MJadwal']['KELAS'];
            $T_A = $_POST['MJadwal']['TA'];
            $id = $KODE_MK_form . "-" . $Kelas_form . "-" . $T_A;
            $hasil = BeritaAcaraDaftarHadir::model()->findAllBySql(" SELECT * FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form'");
            $hadir = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form' AND STATUS LIKE 'H'")->queryAll();
            $absen = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form' AND STATUS LIKE 'A'")->queryAll();
            $jmlHadir = 0;
            foreach ($hadir as $item) {
                $jmlHadir = $item['COUNT(*)'];
            }
            $jmlabsen = 0;
            foreach ($absen as $item) {
                $jmlabsen = $item['COUNT(*)'];
            }
            if ($hasil)
                $this->redirect(array('IndexData', 'id' => $id, 'lapet' => $jmlHadir, 'lapet2' => $jmlabsen));
        }
        $this->render('SearcHDaftarHadir', array(
            'model' => $model,
            'djadwal' => $djadwal,
            'mjadwal' => $mjadwal,
        ));
    }

    public function actionIndexData($id, $lapet, $lapet2) {
        //$dataProvider = new CActiveDataProvider('BeritaAcaraKuliah');
        //
        //echo $lapet;
        //echo $lapet2;
        //var_dump($lapet) ;
        $this->render('IndexDataSearch', array(
            'message' => $id, 'wew' => $lapet, 'wow' => $lapet2,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'berita-acara-daftar-hadir-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionValidate($rfid, $nim, $datetime) {

        $temp = explode(" ", $datetime);
        $tanggal = $temp[0];
        $waktu = $temp[1];

        $ruangan = Ruangan::model()->findByAttributes(array('RFID' => $rfid));
        echo $ruangan->SHORT_NAME;
        $sql = "SELECT * FROM m_jadwal mj INNER JOIN d_jadwal dj ON mj.`ID`=dj.`ID_JADWAL` 
WHERE ((dj.RUANGAN='$ruangan->SHORT_NAME' AND  mj.TANGGAL ='$tanggal') 
AND ('$waktu' BETWEEN (SUBTIME(dj.`START_TIME`,'0:15:00'))  AND (ADDTIME(dj.`END_TIME`,'0:15:00'))) 
AND mj.KELAS IN (SELECT KELAS FROM registrasi WHERE registrasi.`NIM`='$nim' ORDER BY SEM DESC))";

        $list = Yii::app()->db->createCommand($sql)->queryAll();
        if ($list) {
            foreach ($list as $l) {
                $kehadiran = BeritaAcaraDaftarHadir::model()->findByAttributes(
                        array(
                            'ID_DETAIL_JADWAL' => $l['ID'],
                            'NIM' => $nim,
                        )
                );

                if ($this->cekKehadiran($kehadiran->STATUS)) {
                    $kehadiran->STATUS = 'H';
                    $kehadiran->WAKTU_ABSEN = $waktu;
                    $kehadiran->save();
                    echo "Berhasil";
                } else {
                    echo "Sudah Ter Absen" . "<BR>";
                }
            }
        } else {
//            var_dump($list);
//            $this->render('admin', array(
//                'model' => $model,
//            ));
            echo "Gagal";
        }
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionValidatenew($rfid, $nim, $date, $time) {

        $tanggal = $date;
        $waktu = $time;

        $ruangan = Ruangan::model()->findByAttributes(array('RFID' => $rfid));
        echo $ruangan->SHORT_NAME;
        $sql = "SELECT * FROM m_jadwal mj INNER JOIN d_jadwal dj ON mj.`ID`=dj.`ID_JADWAL` 
WHERE ((dj.RUANGAN='$ruangan->SHORT_NAME' AND  mj.TANGGAL ='$tanggal') 
AND ('$waktu' BETWEEN (SUBTIME(dj.`START_TIME`,'0:15:00'))  AND (ADDTIME(dj.`END_TIME`,'0:15:00'))) 
AND mj.KELAS IN (SELECT KELAS FROM registrasi WHERE registrasi.`NIM`='$nim' ORDER BY SEM DESC))";

        $list = Yii::app()->db->createCommand($sql)->queryAll();
        if ($list) {
            foreach ($list as $l) {
                $kehadiran = BeritaAcaraDaftarHadir::model()->findByAttributes(
                        array(
                            'ID_DETAIL_JADWAL' => $l['ID'],
                            'NIM' => $nim,
                        )
                );

                if ($this->cekKehadiran($kehadiran->STATUS)) {
                    $kehadiran->STATUS = 'H';
                    $kehadiran->WAKTU_ABSEN = $waktu;
                    $kehadiran->save();
                    echo "Berhasil";
                } else {
                    echo "Sudah Ter Absen" . "<BR>";
                }
            }
        } else {
//            var_dump($list);
//            $this->render('admin', array(
//                'model' => $model,
//            ));
            echo "Gagal";
        }
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    protected function cekKehadiran($status) {
        return ($status == 'A' ? true : false);
    }

    public function actionsearchGrafikDaftarHadirMahasiswa() {
        $model = new BeritaAcaraDaftarHadir;
        $djadwal = new DJadwal;
        $mjadwal = new MJadwal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $KODE_MK_form = "";
        $NIM_form = "";
        if (isset($_POST['BeritaAcaraDaftarHadir']) || isset($_POST['DJadwal'])) {
            //$model->attributes = $_POST['BeritaAcaraKuliah'];
            $KODE_MK_form = $_POST['DJadwal']['KODE_MK'];
            $NIM_form = $_POST['BeritaAcaraDaftarHadir']['NIM'];
            $id = $KODE_MK_form . "-" . $NIM_form;
            //echo $KODE_MK_form."<BR>";
            //echo $NIM_form;
            $hasil = BeritaAcaraDaftarHadir::model()->findAllBySql(" SELECT * FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                               WHERE dj.`KODE_MK` = '$KODE_MK_form' AND badh.`NIM` = '$NIM_form'");

            if ($NIM_form == NULL) {
                Yii::app()->user->setFlash('success', 'Anda belum memasukkan NIM');
            } else if ($hasil == NULL) {
                Yii::app()->user->setFlash('failed', 'NIM : ' . $NIM_form . ' tidak terdapat dalam aplikasi');
            }
            //echo var_dump($hasil);
            $hadir = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE dj.`KODE_MK` = '$KODE_MK_form' AND badh.`NIM` = '$NIM_form' AND STATUS LIKE 'H'")->queryAll();
            //echo var_dump($hadir);
            $absen = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE dj.`KODE_MK` = '$KODE_MK_form' AND badh.`NIM` = '$NIM_form' AND STATUS LIKE 'A'")->queryAll();
            $jmlHadir = 0;

            foreach ($hadir as $item) {
                $jmlHadir = $item['COUNT(*)'];
            }
            $jmlabsen = 0;
            foreach ($absen as $item) {
                $jmlabsen = $item['COUNT(*)'];
            }
            if ($hasil)
                $this->redirect(array('IndexGrafikDataMahasiswa', 'id' => $id, 'lapet' => $jmlHadir, 'lapet2' => $jmlabsen));
        }

        $this->render('SearcHDaftarHadirMahasiswa', array(
            'model' => $model,
            'djadwal' => $djadwal,
            'mjadwal' => $mjadwal,
        ));
    }

    public function actionIndexGrafikDataMahasiswa($id, $lapet, $lapet2) {
        //$dataProvider = new CActiveDataProvider('BeritaAcaraKuliah');
        //
        //echo $lapet;
        //echo $lapet2;
        //var_dump($lapet) ;
        $this->render('IndexDataSearchGrafikMahasiswa', array(
            'message' => $id, 'wew' => $lapet, 'wow' => $lapet2,
        ));
    }

    public function actionAbsen() {
        $model = new Excel;
        if (isset($_POST['Excel'])) {
            $model->attributes = $_POST['Excel'];
            $fileName = CUploadedFile::getInstance($model, 'excelfile');

            if ($model->validate()) {
                $fileName->saveAs(Yii::app()->basePath . '/../absensi/' . $fileName);
                $this->redirect(array('daftarhadir', 'path' => Yii::app()->basePath . '/../absensi/' . $fileName));
            }
        }
        $this->render('upload', array('model' => $model));
    }

    public function actionDaftarhadir($path) {
        $this->render('kehadiran', array('path' => $path));
    }

    public function kehadiran() {
        $this->redirect(array('MJadwal/index'));
    }

    public function cekDaftarhadir($kehadiranX) {
        $tanggal = $kehadiranX[3];
        $waktu = $kehadiranX[4];

        $ruangan = Ruangan::model()->find(array('condition' => "RFID LIKE '%$kehadiranX[5]%'"));
//        echo $ruangan->SHORT_NAME;
        $sql = "SELECT * FROM m_jadwal mj INNER JOIN d_jadwal dj ON mj.`ID`=dj.`ID_JADWAL` 
WHERE ((dj.RUANGAN='$ruangan->SHORT_NAME' AND  mj.TANGGAL ='$tanggal') 
AND ('$waktu' BETWEEN (SUBTIME(dj.`START_TIME`,'0:15:00'))  AND (ADDTIME(dj.`END_TIME`,'0:15:00'))) 
AND mj.KELAS IN (SELECT KELAS FROM registrasi WHERE registrasi.`NIM`='$kehadiranX[1]' ORDER BY SEM DESC))";

//        echo $sql . "<BR>";
        $list = Yii::app()->db->createCommand($sql)->queryAll();
        if ($list) {
            foreach ($list as $l) {
                $kehadiran = BeritaAcaraDaftarHadir::model()->findByAttributes(
                        array(
                            'ID_DETAIL_JADWAL' => $l['ID'],
                            'NIM' => $kehadiranX[1],
                        )
                );

                if ($this->cekKehadiran($kehadiran->STATUS)) {
                    $kehadiran->STATUS = 'H';
                    $kehadiran->WAKTU_ABSEN = $waktu;
                    $kehadiran->save();
//                    echo "Berhasil";
                } else {
//                    echo "Sudah Ter Absen" . "<BR>";
                }
            }
        } else {
//            var_dump($list);
//            $this->render('admin', array(
//                'model' => $model,
//            ));
//            echo "Gagal";
        }
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
    }

}
