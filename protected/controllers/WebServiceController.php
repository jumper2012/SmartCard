<?php

class WebServiceController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actions() 
        {
            return array(
                'wsdl' => array(
                    'class' => 'CWebServiceAction',
                ),
            );
        }
        
        /**
        * @return string the result
        * @soap
        */
        public function testKoneksiWS() 
        {
            return "Koneksi WS Berhasil !";
        }
        
        /** Ruangan **/
        /**
         * @param string
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @return string the result
         * @soap
        */
        public function insertNewRuangan($ID, $ShortName, $Name, $Kapasitas, $Ket, $Status, $LastUpdate, $UserID, $Ws, $RFID) 
        {
            $model = new Ruangan();
            $model->ID = $ID;
            $model->SHORT_NAME = $ShortName;
            $model->NAME = $Name;
            $model->KAPASITAS = $Kapasitas;
            $model->KET = $Ket;
            $model->STATUS = $Status;
            $model->LAST_UPDATE = $LastUpdate;
            $model->USER_ID = $UserID;
            $model->WS = $Ws;
            $model->RFID = $RFID;
            if($model->save())
            {
                return "Data berhasil di tambahkan !";
            }
            else
            {
                return "Data gagal di tambahkan !";
            }
        }
        /**
         * @param string
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @return string the result
         * @soap
        */
        public function updateRuangan($ID_Ruangan, $ShortName, $Name, $Kapasitas, $Ket, $Status, $LastUpdate, $UserID, $Ws, $RFID)
        {
            $model = Ruangan::model()->findByAttributes(array('ID'=>$ID_Ruangan));
            $model->SHORT_NAME = $ShortName;
            $model->NAME = $Name;
            $model->KAPASITAS = $Kapasitas;
            $model->KET = $Ket;
            $model->STATUS = $Status;
            $model->LAST_UPDATE = $LastUpdate;
            $model->USER_ID = $UserID;
            $model->WS = $Ws;
            $model->RFID = $RFID;
            $model->save();
        }
        /**
         * @param string id_ruangan
         * @soap
        */
        public function deleteRuangan($ID_Ruangan)
        {
            Ruangan::model()->deleteAll("ID = '".$ID_Ruangan."'");
        }
        /** Ruangan **/

        /** Pegawai **/
        /**
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param agama
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @soap
         */
        /**
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @soap
         */
        public function insertNewPegawai($id, $nip, $kpt_no, $user_name, $nama, $posisi, $alias, $tgl_lahir, $tempat_lahir, $jenis_kelamin, $gol_darah, $tgl_masuk, $tgl_keluar, $agama, $kbk_id, $ext_num, $hp, $email, $alamat_libur, $kota, $kode_pos, $telepon, $ktp, $pendidikan, $jabatan, $pendidikan_tertinggi, $study_area1, $study_area2, $status, $nama_bapak, $nama_ibu, $pekerjaan_ortu, $nama_p, $tmp_lahir_p, $tgl_lahir_p, $ket, $status_akhir, $last_update, $user_id, $ws)
        {
            $model = new Pegawai();
            $model->ID = $nip;
            $model->NIP = $nip;
            $model->KPT_NO = $kpt_no;
            $model->USER_NAME = $user_name;
            $model->NAMA = $nama;
            $model->POSISI = $posisi;
            $model->ALIAS = $alias;
            $model->TGL_LAHIR = $tgl_lahir;
            $model->TEMPAT_LAHIR = $tempat_lahir;
            $model->JENIS_KELAMIN = $jenis_kelamin;
            $model->GOL_DARAH = $gol_darah;
            $model->TGL_MASUK = $tgl_masuk;
            $model->TGL_KELUAR = $tgl_keluar;
            $model->AGAMA = $agama;
            $model->KBK_ID = $kbk_id;
            $model->EXT_NUM = $ext_num;
            $model->HP = $hp;
            $model->EMAIL = $email;
            $model->ALAMAT_LIBUR = $alamat_libur;
            $model->KOTA = $kota;
            $model->KODE_POS = $kode_pos;
            $model->TELEPON = $telepon;
            $model->KTP = $ktp;
            $model->PENDIDIKAN = $pendidikan;
            $model->JABATAN = $jabatan;
            $model->PENDIDIKAN_TERTINGGI = $pendidikan_tertinggi;
            $model->STUDY_AREA1 = $study_area1;
            $model->STUDY_AREA2 = $study_area2;
            $model->STATUS = $status;
            $model->NAMA_BAPAK = $nama_bapak;
            $model->NAMA_IBU = $nama_ibu;
            $model->PEKERJAAN_ORTU = $pekerjaan_ortu;
            $model->NAMA_P = $nama_p;
            $model->TMP_LAHIR_P = $tmp_lahir_p;
            $model->TGL_LAHIR_P = $tgl_lahir_p;
            $model->KET = $ket;
            $model->STATUS_AKHIR = $status_akhir;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param int
     * @param string
     * @param string
     * @soap
     */
        public function updatePegawai($id, $nip, $kpt_no, $user_name, $nama, $posisi, $alias, $tgl_lahir, $tempat_lahir, $jenis_kelamin, $gol_darah, $tgl_masuk, $tgl_keluar, $agama, $kbk_id, $ext_num, $hp, $email, $alamat_libur, $kota, $kode_pos, $telepon, $ktp, $pendidikan, $jabatan, $pendidikan_tertinggi, $study_area1, $study_area2, $status, $nama_bapak, $nama_ibu, $pekerjaan_ortu, $nama_p, $tmp_lahir_p, $tgl_lahir_p, $ket, $status_akhir, $last_update, $user_id, $ws)
        {
            $model = Pegawai::model()->findByAttributes(array('ID'=>$id));
            $model->NIP = $nip;
            $model->KPT_NO = $kpt_no;
            $model->USER_NAME = $user_name;
            $model->NAMA = $nama;
            $model->POSISI = $posisi;
            $model->ALIAS = $alias;
            $model->TGL_LAHIR = $tgl_lahir;
            $model->TEMPAT_LAHIR = $tempat_lahir;
            $model->JENIS_KELAMIN = $jenis_kelamin;
            $model->GOL_DARAH = $gol_darah;
            $model->TGL_MASUK = $tgl_masuk;
            $model->TGL_KELUAR = $tgl_keluar;
            $model->AGAMA = $agama;
            $model->KBK_ID = $kbk_id;
            $model->EXT_NUM = $ext_num;
            $model->HP = $hp;
            $model->EMAIL = $email;
            $model->ALAMAT_LIBUR = $alamat_libur;
            $model->KOTA = $kota;
            $model->KODE_POS = $kode_pos;
            $model->TELEPON = $telepon;
            $model->KTP = $ktp;
            $model->PENDIDIKAN = $pendidikan;
            $model->JABATAN = $jabatan;
            $model->PENDIDIKAN_TERTINGGI = $pendidikan_tertinggi;
            $model->STUDY_AREA1 = $study_area1;
            $model->STUDY_AREA2 = $study_area2;
            $model->STATUS = $status;
            $model->NAMA_BAPAK = $nama_bapak;
            $model->NAMA_IBU = $nama_ibu;
            $model->PEKERJAAN_ORTU = $pekerjaan_ortu;
            $model->NAMA_P = $nama_p;
            $model->TMP_LAHIR_P = $tmp_lahir_p;
            $model->TGL_LAHIR_P = $tgl_lahir_p;
            $model->KET = $ket;
            $model->STATUS_AKHIR = $status_akhir;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
         * @param string id_pegawai
         * @soap
         */
        public function deletePegawai($id_pegawai)
        {
            Pegawai::model()->deleteAll("ID = '".$id_pegawai."'");
        }
        /** Pegawai **/

        /** Nilai **/
        /**
         * @param int
         * @param string
         * @param string
         * @param int
         * @param string
         * @param float
         * @param string
         * @param string
         * @param int
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @soap
         */
        public function insertNewNilai($id_kur, $kode_mk, $ta, $sem_ta, $nim, $na, $nilai, $kelas, $sks, $sem, $wali_approval, $dir_approval, $dosen_approval, $keterangan, $last_update, $user_id, $ws)
        {
            $model = new Nilai();
            $model->ID_KUR = $id_kur;
            $model->KODE_MK = $kode_mk;
            $model->TA = $ta;
            $model->SEM_TA = $sem_ta;
            $model->NIM = $nim;
            $model->NA = $model->NA;
            $model->NILAI = $nilai;
            $model->KELAS = $kelas;
            $model->SKS = $sks;
            $model->SEM = $sem;
            $model->WALI_APPROVAL = $wali_approval;
            $model->DIR_APPROVAL = $dir_approval;
            $model->DOSEN_APPROVAL = $dosen_approval;
            $model->KETERANGAN = $keterangan;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
     * @param int
     * @param string
     * @param string
     * @param int
     * @param string
     * @param float
     * @param string
     * @param string
     * @param int
     * @param int
     * @param string
     * @param string
     * @param string
     * @param string
     * @param int
     * @param string
     * @param string
     * @soap
     */
        public function updateNilai($id_kur, $kode_mk, $ta, $sem_ta, $nim, $na, $nilai, $kelas, $sks, $sem, $wali_approval, $dir_approval, $dosen_approval, $keterangan, $last_update, $user_id, $ws)
        {
            $model = Nilai::model()->findByAttributes(array('ID_KUR'=>$id_kur, 'KODE_MK'=>$kode_mk, 'TA'=>$ta, 'NIM'=>$nim));
            $model->SEM_TA = $sem_ta;
            $model->NA = $na;
            $model->NILAI = $nilai;
            $model->KELAS = $kelas;
            $model->SKS = $sks;
            $model->SEM = $sem;
            $model->WALI_APPROVAL = $wali_approval;
            $model->DIR_APPROVAL = $dir_approval;
            $model->DOSEN_APPROVAL = $dosen_approval;
            $model->KETERANGAN = $keterangan;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
         * @param int id_kur
         * @param string kode_mk
         * @param string ta
         * @param string nim
         * @soap
         */
        public function deleteNilai($id_kur, $kode_mk, $ta, $nim)
        {
            Nilai::model()->deleteAll("ID_KUR = '".$id_kur."' and KODE_MK = '".$kode_mk."' and TA = '".$ta."' and NIM = '".$nim."'");
        }
        /** Nilai **/

        /** Kurikulum **/
        /**
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param int
         * @param int
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param int
         * @param int
         * @param int
         * @param int
         * @param int
         * @param string
         * @param int
         * @param int
         * @param int
         * @param int
         * @param int
         * @param int
         * @param int
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @soap
         */
        public function insertNewKurikulum($id_kur, $kode_mk, $nama_kul_ind, $nama_kul_ing, $short_name, $kbk_id, $course_group, $sks, $sem, $urut_dlm_sem, $sifat, $key_topics_ind, $key_topics_ing, $objektif_ind, $objektif_ing, $lab_hour, $tutorial_hour, $course_hour, $course_hour_in_week, $lab_hour_in_week, $number_week, $other_activity, $other_activity_hour, $knowledge, $skill, $attitude, $uts, $uas, $tugas, $quiz, $whiteboard, $lcd, $courseware, $lab, $elearning, $status, $last_update, $user_id, $ws, $prerequisites, $course_description, $course_objectives, $learning_outcomes, $course_format, $grading_procedure, $course_content)
        {
            $model = new Kurikulum();
            $model->ID_KUR = $id_kur;
            $model->KODE_MK = $kode_mk;
            $model->NAMA_KUL_IND = $nama_kul_ind;
            $model->NAMA_KUL_ING = $nama_kul_ing;
            $model->SHORT_NAME = $short_name;
            $model->KBK_ID = $kbk_id;
            $model->COURSE_GROUP = $course_group;
            $model->SKS = $sks;
            $model->SEM = $sem;
            $model->URUT_DLM_SEM = $urut_dlm_sem;
            $model->SIFAT = $sifat;
            $model->KEY_TOPICS_IND = $key_topics_ind;
            $model->KEY_TOPICS_ING = $key_topics_ing;
            $model->OBJEKTIF_IND = $objektif_ind;
            $model->OBJEKTIF_ING = $objektif_ing;
            $model->LAB_HOUR = $lab_hour;
            $model->TUTORIAL_HOUR = $tutorial_hour;
            $model->COURSE_HOUR = $course_hour;
            $model->COURSE_HOUR_IN_WEEK = $course_hour_in_week;
            $model->LAB_HOUR_IN_WEEK = $lab_hour_in_week;
            $model->NUMBER_WEEK = $number_week;
            $model->OTHER_ACTIVITY = $other_activity;
            $model->OTHER_ACTIVITY_HOUR = $other_activity_hour;
            $model->KNOWLEDGE = $knowledge;
            $model->SKILL = $skill;
            $model->ATTITUDE = $attitude;
            $model->UTS = $uts;
            $model->UAS = $uas;
            $model->TUGAS = $tugas;
            $model->QUIZ = $quiz;
            $model->WHITEBOARD = $whiteboard;
            $model->LCD = $lcd;
            $model->COURSEWARE = $courseware;
            $model->LAB = $lab;
            $model->ELEARNING = $elearning;
            $model->STATUS = $status;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->PREREQUISITES = $prerequisites;
            $model->COURSE_DESCRIPTION = $course_description;
            $model->COURSE_OBJECTIVES = $course_objectives;
            $model->LEARNING_OUTCOMES = $learning_outcomes;
            $model->COURSE_FORMAT = $course_format;
            $model->GRADING_PROCEDURE = $grading_procedure;
            $model->COURSE_CONTENT = $course_content;
            $model->save();
        }
        /**
     * @param int
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param int
     * @param int
     * @param int
     * @param int
     * @param string
     * @param string
     * @param string
     * @param string
     * @param int
     * @param int
     * @param int
     * @param int
     * @param int
     * @param int
     * @param string
     * @param int
     * @param int
     * @param int
     * @param int
     * @param int
     * @param int
     * @param int
     * @param int
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param int
     * @param int
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @soap
     */
        public function updateKurikulum($id_kur, $kode_mk, $nama_kul_ind, $nama_kul_ing, $short_name, $kbk_id, $course_group, $sks, $sem, $urut_dlm_sem, $sifat, $key_topics_ind, $key_topics_ing, $objektif_ind, $objektif_ing, $lab_hour, $tutorial_hour, $course_hour, $course_hour_in_week, $lab_hour_in_week, $number_week, $other_activity, $other_activity_hour, $knowledge, $skill, $attitude, $uts, $uas, $tugas, $quiz, $whiteboard, $lcd, $courseware, $lab, $elearning, $status, $last_update, $user_id, $ws, $prerequisites, $course_description, $course_objectives, $learning_outcomes, $course_format, $grading_procedure, $course_content)
        {
            $model = Kurikulum::model()->findByAttributes(array('ID_KUR'=>$id_kur, 'KODE_MK'=>$kode_mk));
            $model->NAMA_KUL_IND = $nama_kul_ind;
            $model->NAMA_KUL_ING = $nama_kul_ing;
            $model->SHORT_NAME = $short_name;
            $model->KBK_ID = $kbk_id;
            $model->COURSE_GROUP = $course_group;
            $model->SKS = $sks;
            $model->SEM = $sem;
            $model->URUT_DLM_SEM = $urut_dlm_sem;
            $model->SIFAT = $sifat;
            $model->KEY_TOPICS_IND = $key_topics_ind;
            $model->KEY_TOPICS_ING = $key_topics_ing;
            $model->OBJEKTIF_IND = $objektif_ind;
            $model->OBJEKTIF_ING = $objektif_ing;
            $model->LAB_HOUR = $lab_hour;
            $model->TUTORIAL_HOUR = $tutorial_hour;
            $model->COURSE_HOUR = $course_hour;
            $model->COURSE_HOUR_IN_WEEK = $course_hour_in_week;
            $model->LAB_HOUR_IN_WEEK = $lab_hour_in_week;
            $model->NUMBER_WEEK = $number_week;
            $model->OTHER_ACTIVITY = $other_activity;
            $model->OTHER_ACTIVITY_HOUR = $other_activity_hour;
            $model->KNOWLEDGE = $knowledge;
            $model->SKILL = $skill;
            $model->ATTITUDE = $attitude;
            $model->UTS = $uts;
            $model->UAS = $uas;
            $model->TUGAS = $tugas;
            $model->QUIZ = $quiz;
            $model->WHITEBOARD = $whiteboard;
            $model->LCD = $lcd;
            $model->COURSEWARE = $courseware;
            $model->LAB = $lab;
            $model->ELEARNING = $elearning;
            $model->STATUS = $status;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->PREREQUISITES = $prerequisites;
            $model->COURSE_DESCRIPTION = $course_description;
            $model->COURSE_OBJECTIVES = $course_objectives;
            $model->LEARNING_OUTCOMES = $learning_outcomes;
            $model->COURSE_FORMAT = $course_format;
            $model->GRADING_PROCEDURE = $grading_procedure;
            $model->COURSE_CONTENT = $course_content;
            $model->save();
        }
        /**
         * @param int id_kur
         * @param string kode_mk
         * @soap
         */
        public function deleteKurikulum($id_kur, $kode_mk)
        {
            Kurikulum::model()->deleteAll("ID_KUR = '".$id_kur."' and KODE_MK = '".$kode_mk."'");
        }
        /** Kurikulum **/

        /** Kelas **/
        /**
         * @param string kelas
         * @param string ket
         * @param int last_update
         * @param string user_id
         * @param string ws
         * @soap
         */
        public function insertNewKelas($kelas, $ket, $last_update, $user_id, $ws)
        {
            $model = new Kelas();
            $model->KELAS = $kelas;
            $model->KET = $ket;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }

        /**
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @soap
         */
        public function updateKelas($kelas, $ket, $last_update, $user_id, $ws)
        {
            $model = Kelas::model()->findByAttributes(array('KELAS'=>$kelas));
            $model->KET = $ket;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
         * @param string kelas
         * @soap
         */
        public function deleteKelas($kelas)
        {
            Kelas::model()->deleteAll("KELAS = '".$kelas."'");
        }
        /** Kelas **/

        /** Dim **/
        /**
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param int
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param string
         * @param float
         * @param int
         * @param int
         * @param int
         * @param float
         * @param int
         * @param string
         * @param int
         * @param string
         * @param string
         * @soap
         */
        public function insertNewDim($nim, $no_usm, $jalur, $user_name, $kbk_id, $kpt_prodi, $id_kur, $nama, $tgl_lahir, $tempat_lahir, $gol_darah, $jenis_kelamin, $agama, $alamat, $kabupaten, $kode_pos, $email, $telepon, $hp, $hp2, $nama_sma, $no_ijazah_sma, $alamat_sma, $kabupaten_sma, $kodepos_sma, $telepon_sma, $thn_masuk, $status_akhir, $nama_ayah, $nama_ibu, $no_hp_ayah, $no_hp_ibu, $alamat_orangtua, $pekerjaan_ayah, $keterangan_pekerjaan_ayah, $penghasilan_ayah, $pekerjaan_ibu, $keterangan_pekerjaan_ibu, $penghasilan_ibu, $nama_wali, $pekerjaan_wali, $keterangan_pekerjaan_wali, $penghasilan_wali, $alamat_wali, $telepon_wali, $no_hp_wali, $pendapatan, $ipk, $anak_ke, $dari_jlh_anak, $jumlah_tanggungan, $nilai_usm, $score_iq, $rekomendasi_psikotest, $last_update, $user_id, $ws)
        {
            $model = new Dim();
            $model->NIM = $nim;
            $model->NO_USM = $no_usm;
            $model->JALUR = $jalur;
            $model->USER_NAME = $user_name;
            $model->KBK_ID = $kbk_id;
            $model->KPT_PRODI = $kpt_prodi;
            $model->ID_KUR = $id_kur;
            $model->NAMA = $nama;
            $model->TGL_LAHIR = $tgl_lahir;
            $model->TEMPAT_LAHIR = $tempat_lahir;
            $model->GOL_DARAH = $gol_darah;
            $model->JENIS_KELAMIN = $jenis_kelamin;
            $model->AGAMA = $agama;
            $model->KABUPATEN = $kabupaten;
            $model->KODE_POS = $kode_pos;
            $model->EMAIL = $email;
            $model->TELEPON = $telepon;
            $model->HP = $hp;
            $model->HP2 = $hp2;
            $model->NAMA_SMA = $nama_sma;
            $model->NO_IJAZAH_SMA = $no_ijazah_sma;
            $model->ALAMAT_SMA = $alamat_sma;
            $model->KABUPATEN_SMA = $kabupaten_sma;
            $model->KODEPOS_SMA = $kodepos_sma;
            $model->TELEPON_SMA = $telepon_sma;
            $model->THN_MASUK = $thn_masuk;
            $model->STATUS_AKHIR = $status_akhir;
            $model->NAMA_AYAH = $nama_ayah;
            $model->NAMA_IBU = $nama_ibu;
            $model->NO_HP_AYAH = $no_hp_ayah;
            $model->NO_HP_IBU = $no_hp_ibu;
            $model->ALAMAT_ORANGTUA = $alamat_orangtua;
            $model->PEKERJAAN_AYAH = $pekerjaan_ayah;
            $model->KETERANGAN_PEKERJAAN_AYAH = $keterangan_pekerjaan_ayah;
            $model->PENGHASILAN_AYAH = $penghasilan_ayah;
            $model->PEKERJAAN_IBU = $pekerjaan_ibu;
            $model->KETERANGAN_PEKERJAAN_IBU = $keterangan_pekerjaan_ibu;
            $model->PENGHASILAN_IBU = $penghasilan_ibu;
            $model->NAMA_WALI = $nama_wali;
            $model->PEKERJAAN_WALI = $pekerjaan_wali;
            $model->KETERANGAN_PEKERJAAN_WALI = $keterangan_pekerjaan_wali;
            $model->PENGHASILAN_WALI = $penghasilan_wali;
            $model->ALAMAT_WALI = $alamat_wali;
            $model->TELEPON_WALI = $telepon_wali;
            $model->NO_HP_WALI = $no_hp_wali;
            $model->PENDAPATAN = $pendapatan;
            $model->IPK = $ipk;
            $model->ANAK_KE = $anak_ke;
            $model->DARI_JLH_ANAK = $dari_jlh_anak;
            $model->JUMLAH_TANGGUNGAN = $jumlah_tanggungan;
            $model->NILAI_USM = $nilai_usm;
            $model->SCORE_IQ = $score_iq;
            $model->REKOMENDASI_PSIKOTEST = $rekomendasi_psikotest;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param int
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @param float
     * @param int
     * @param int
     * @param int
     * @param float
     * @param int
     * @param string
     * @param int
     * @param string
     * @param string
     * @soap
     */
        public function updateDim($nim, $no_usm, $jalur, $user_name, $kbk_id, $kpt_prodi, $id_kur, $nama, $tgl_lahir, $tempat_lahir, $gol_darah, $jenis_kelamin, $agama, $alamat, $kabupaten, $kode_pos, $email, $telepon, $hp, $hp2, $nama_sma, $no_ijazah_sma, $alamat_sma, $kabupaten_sma, $kodepos_sma, $telepon_sma, $thn_masuk, $status_akhir, $nama_ayah, $nama_ibu, $no_hp_ayah, $no_hp_ibu, $alamat_orangtua, $pekerjaan_ayah, $keterangan_pekerjaan_ayah, $penghasilan_ayah, $pekerjaan_ibu, $keterangan_pekerjaan_ibu, $penghasilan_ibu, $nama_wali, $pekerjaan_wali, $keterangan_pekerjaan_wali, $penghasilan_wali, $alamat_wali, $telepon_wali, $no_hp_wali, $pendapatan, $ipk, $anak_ke, $dari_jlh_anak, $jumlah_tanggungan, $nilai_usm, $score_iq, $rekomendasi_psikotest, $last_update, $user_id, $ws)
        {
            $model = Dim::model()->findByAttributes(array('NIM'=>$nim));
            $model->NO_USM = $no_usm;
            $model->JALUR = $jalur;
            $model->USER_NAME = $user_name;
            $model->KBK_ID = $kbk_id;
            $model->KPT_PRODI = $kpt_prodi;
            $model->ID_KUR = $id_kur;
            $model->NAMA = $nama;
            $model->TGL_LAHIR = $tgl_lahir;
            $model->TEMPAT_LAHIR = $tempat_lahir;
            $model->GOL_DARAH = $gol_darah;
            $model->JENIS_KELAMIN = $jenis_kelamin;
            $model->AGAMA = $agama;
            $model->KABUPATEN = $kabupaten;
            $model->KODE_POS = $kode_pos;
            $model->EMAIL = $email;
            $model->TELEPON = $telepon;
            $model->HP = $hp;
            $model->HP2 = $hp2;
            $model->NAMA_SMA = $nama_sma;
            $model->NO_IJAZAH_SMA = $no_ijazah_sma;
            $model->ALAMAT_SMA = $alamat_sma;
            $model->KABUPATEN_SMA = $kabupaten_sma;
            $model->KODEPOS_SMA = $kodepos_sma;
            $model->TELEPON_SMA = $telepon_sma;
            $model->THN_MASUK = $thn_masuk;
            $model->STATUS_AKHIR = $status_akhir;
            $model->NAMA_AYAH = $nama_ayah;
            $model->NAMA_IBU = $nama_ibu;
            $model->NO_HP_AYAH = $no_hp_ayah;
            $model->NO_HP_IBU = $no_hp_ibu;
            $model->ALAMAT_ORANGTUA = $alamat_orangtua;
            $model->PEKERJAAN_AYAH = $pekerjaan_ayah;
            $model->KETERANGAN_PEKERJAAN_AYAH = $keterangan_pekerjaan_ayah;
            $model->PENGHASILAN_AYAH = $penghasilan_ayah;
            $model->PEKERJAAN_IBU = $pekerjaan_ibu;
            $model->KETERANGAN_PEKERJAAN_IBU = $keterangan_pekerjaan_ibu;
            $model->PENGHASILAN_IBU = $penghasilan_ibu;
            $model->NAMA_WALI = $nama_wali;
            $model->PEKERJAAN_WALI = $pekerjaan_wali;
            $model->KETERANGAN_PEKERJAAN_WALI = $keterangan_pekerjaan_wali;
            $model->PENGHASILAN_WALI = $penghasilan_wali;
            $model->ALAMAT_WALI = $alamat_wali;
            $model->TELEPON_WALI = $telepon_wali;
            $model->NO_HP_WALI = $no_hp_wali;
            $model->PENDAPATAN = $pendapatan;
            $model->IPK = $ipk;
            $model->ANAK_KE = $anak_ke;
            $model->DARI_JLH_ANAK = $dari_jlh_anak;
            $model->JUMLAH_TANGGUNGAN = $jumlah_tanggungan;
            $model->NILAI_USM = $nilai_usm;
            $model->SCORE_IQ = $score_iq;
            $model->REKOMENDASI_PSIKOTEST = $rekomendasi_psikotest;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
         * @param string nim
         * @soap
         */
        public function deleteDim($nim)
        {
            Dim::model()->deleteAll("NIM = '".$nim."'");
        }
        /** Dim*/

        /*-- Pengajar */
        /**
         * @param string dosen_id
         * @param int ta
         * @param int id_kur
         * @param string kode_mk
         * @param string
         * @param int last_update
         * @param string user_id
         * @param string ws
         * @soap
        */
        public function insertNewPengajar($dosen_id, $ta, $id_kur, $kode_mk, $role, $last_update, $user_id, $ws)
        {
            $model = new Pengajar();
            $model->DOSEN_ID = $dosen_id;
            $model->TA = $ta;
            $model->ID_KUR = $id_kur;
            $model->KODE_MK = $kode_mk;
            $model->ROLE = $role;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
     * @param string dosen_id
     * @param int ta
     * @param int id_kur
     * @param string kode_mk
     * @param string role
     * @param int last_update
     * @param string user_id
     * @param string ws
     * @soap
     */
        public function updatePengajar($dosen_id, $ta, $id_kur, $kode_mk, $role, $last_update, $user_id, $ws)
        {
            $model = Pengajar::model()->findByAttributes(array('DOSEN_ID'=>$dosen_id, 'TA'=>$ta, 'ID_KUR'=>$id_kur, 'KODE_MK'=>$kode_mk));
            $model->ROLE = $role;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
         * @param string dosen_id
         * @param int ta
         * @param int id_kur
         * @param string kode_mk
         * @soap
         */
        public function deletePengajar($dosen_id, $ta, $id_kur, $kode_mk)
        {
            Pengajar::model()->deleteAll("DOSEN_ID = '".$dosen_id."' and TA = '".$ta."' and ID_KUR = '".$id_kur."' and KODE_MK = '".$kode_mk."'");
        }
        /** Pengajar **/

        /** Registrasi **/
        /**
         * @param string nim
         * @param string ta
         * @param int sem_ta
         * @param int sem
         * @param string tgl_daftar
         * @param double keuangan
         * @param string kelas
         * @param string id_wali
         * @param float nr
         * @param int koa_approval
         * @param int koa_approval_bp
         * @param int last_update
         * @param string user_id
         * @param string ws
         * @soap
        */
        public function insertNewRegistrasi($nim, $ta, $sem_ta, $sem, $tgl_daftar, $keuangan, $kelas, $id_wali, $nr, $koa_approval, $koa_approval_bp, $last_update, $user_id, $ws)
        {
            $model = new Registrasi();
            $model->NIM = $nim;
            $model->TA = $ta;
            $model->SEM_TA = $sem_ta;
            $model->SEM = $sem;
            $model->TGL_DAFTAR = $tgl_daftar;
            $model->KEUANGAN = $keuangan;
            $model->KELAS = $kelas;
            $model->ID_WALI = $id_wali;
            $model->NR = $nr;
            $model->KOA_APPROVAL = $koa_approval;
            $model->KOA_APPROVAL_BP = $koa_approval_bp;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
     * @param string nim
     * @param string ta
     * @param int sem_ta
     * @param int sem
     * @param string tgl_daftar
     * @param double keuangan
     * @param string kelas
     * @param string id_wali
     * @param float nr
     * @param int koa_approval
     * @param int koa_approval_bp
     * @param int last_update
     * @param string user_id
     * @param string ws
     * @soap
     */
        public function updateRegistrasi($nim, $ta, $sem_ta, $sem, $tgl_daftar, $keuangan, $kelas, $id_wali, $nr, $koa_approval, $koa_approval_bp, $last_update, $user_id, $ws)
        {
            $model = Registrasi::model()->findByAttributes(array('NIM'=>$nim, 'TA'=>$ta, 'SEM_TA'=>$sem_ta));
            $model->SEM = $sem;
            $model->TGL_DAFTAR = $tgl_daftar;
            $model->KEUANGAN = $keuangan;
            $model->KELAS = $kelas;
            $model->ID_WALI = $id_wali;
            $model->NR = $nr;
            $model->KOA_APPROVAL = $koa_approval;
            $model->KOA_APPROVAL_BP = $koa_approval_bp;
            $model->LAST_UPDATE = $last_update;
            $model->USER_ID = $user_id;
            $model->WS = $ws;
            $model->save();
        }
        /**
         * @param string id_registrasi
         * @param string ta
         * @param int sem_ta
         * @soap
         */
        public function deleteRegistrasi($ID_Registrasi, $TA, $SEM_TA)
        {
            Registrasi::model()->deleteAll("NIM = '".$ID_Registrasi."' and TA = '".$TA."' and SEM_TA = '".$SEM_TA."'");
        }
        /** Registrasi **/

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}