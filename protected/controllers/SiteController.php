<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actionViewGrade() {
        $this->render('viewGrade');
    }

    public function actionViewDate() {
        $this->render('viewCalender');
    }

    public function actionIndexCaleder($id) {
        $this->render('ViewLaporanHari', array('wew' => $id,));
    }

    public function actionViewMonth($id) {
        $this->render('ViewLaporanBulanan');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionXls() {
        $this->render('excel');
    }

    public function createJadwal($arr, $masterjadwal) {
//        foreach ($arr as $hit) {
//            echo $hit . "<BR>";
//        }
//        print_r($arr);
//        echo "<BR>";
//        echo $id;
//        echo "Pretty Fly";

        $detail = new DJadwal;
        $detail->SESSION = $arr[0];
        $detail->KODE_MK = $arr[1];
        if (!empty($detail->KODE_MK)) {
            $detail->RUANGAN = $arr[3];
            $detail->ID_JADWAL = $masterjadwal->ID;
            $detail->START_TIME = $this->start_time($detail->SESSION);
            $detail->END_TIME = $this->end_time($detail->SESSION);
            $detail->AKTIFITAS = $this->cekAktifitas($arr[2]);
            // MAHASISWA
            $sql = "SELECT DISTINCT(nilai.NIM),nilai.`SEM` FROM nilai JOIN registrasi ON nilai.`NIM` = registrasi.`NIM` WHERE KODE_MK LIKE '$detail->KODE_MK' AND registrasi.`TA` = $masterjadwal->TA AND registrasi.`KELAS` LIKE '$masterjadwal->KELAS'";
            $list = Yii::app()->db->createCommand($sql)->queryAll();
            //PENGAJAR
            $sql_pengajar = "SELECT * FROM pengajar WHERE TA LIKE '$masterjadwal->TA' AND ID_KUR LIKE '$masterjadwal->ID_KUR' AND KODE_MK LIKE '$detail->KODE_MK' ORDER BY ROLE ASC";
            $list_pengajar = Yii::app()->db->createCommand($sql_pengajar)->queryAll();
//            echo "<BR>" . $sql_pengajar . "<BR>";
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

    public function cekAktifitas($test) {
        if ($test == "T")
            return "Teori";
        else if ($test == "P")
            return "Praktikum";
        else
            return "Mandiri";
    }

    public function cekMaster($masterjadwal) {
        echo $masterjadwal->TA;
    }

    public function actionUpload() {
        $model = new Excel;
        if (isset($_POST['Excel'])) {
            $model->attributes = $_POST['Excel'];
            $fileName = CUploadedFile::getInstance($model, 'excelfile');

            if ($model->validate()) {
                $fileName->saveAs(Yii::app()->basePath . '/../jadwal/' . $fileName);
                $this->redirect(array('Jadwalxlsx', 'path' => Yii::app()->basePath . '/../jadwal/' . $fileName));
            }
        }
        Yii::app()->user->setFlash('success', 'Upload Daftar Perkuliahan');
        $this->render('upload', array('model' => $model));
    }

    public function actionJadwalxlsx($path) {
        $this->render('excelpath', array('path' => $path));
    }

    public function jadwal() {
        $this->redirect(array('MJadwal/index'));
    }

}
