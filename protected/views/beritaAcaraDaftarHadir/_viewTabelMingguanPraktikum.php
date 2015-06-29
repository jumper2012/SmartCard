<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$tempMessg = explode("_", $data);
$message = $tempMessg[0];
$message2 = $tempMessg[1];

$temp = explode("-", $message);
$Kode = $temp[0];
$Kelas = $temp[1];
$TA = $temp[2];
?>
<?php

$mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode));

/* -- Melihat nama hari dari tanggal -- */
$date = $message2;
$timestamp = strtotime($date);
$day = date('l', $timestamp);
/* -- End -- */

/* -- Variabel -- */
$jmlHariSebelum = 0; // Hari sebelum hari yang di pilih sampai senin
$listHariSesi = array(); // Daftar hari dan sesi pada minggu yang di pilih
/* -- End -- */

/* -- Pengambilan data -- */
if($day == 'Monday'){ // Jika hari ini == Senin
    $indexSesi = 0;
    $sesi = "";
    $indekDinHadirT = 0;
    $indekDinHadirP = 0;
    $tanggal = $date;

    /* -- Query mencari sesi yang ada pada tanggal -- */
    $Query_Sesi = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                 JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                 WHERE mj.TANGGAL LIKE '%$tanggal%'
                                                 and mj.TA = '$TA' and mj.KELAS = '$Kelas' and dj.AKTIFITAS = 'Praktikum'"
    )->queryAll();

    if($Query_Sesi){
        foreach($Query_Sesi as $itemQuerySesi){
            $listHariSesi[$indexSesi] = $day."-".$itemQuerySesi['SESSION'];
            $sesi = $itemQuerySesi['SESSION'];

            $cekT[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal' and dj.AKTIFITAS = 'Teori'"
            )->queryAll();
            if($cekT[$indexSesi]){
                foreach($cekT[$indexSesi] as $itemJadwal){
                    $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                    $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                    $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                    $indekDinHadirT++;
                }
            }

            $cekP[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal' and dj.AKTIFITAS = 'Praktikum'"
            )->queryAll();
            if($cekP[$indexSesi]){
                foreach($cekP[$indexSesi] as $itemJadwal){
                    $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                    $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                    $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                    $indekDinHadirP++;
                }
            }
            $indexSesi++;
        }
    } else {
        $listHariSesi = null;
        $hadirDinT = null;
        $hadirDinP = null;
        $absenDinT = null;
        $absenDinP = null;
    }
} else if($day == 'Tuesday'){
    $jmlHariSebelum = 1;
    $indexSesi = 0;
    $indekDinHadirT = 0;
    $indekDinHadirP = 0;

    for($index = (0 - $jmlHariSebelum); $index <= 0; $index++){
        $param = $index." day";
        $newdate = strtotime($param, strtotime($date));
        $tanggal_Baru = date('Y-m-d', $newdate);
        $timestamp = strtotime($tanggal_Baru);
        $day = date('l', $timestamp);

        /* -- Query mencari sesi yang ada pada tanggal -- */
        $Query_Sesi = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                 JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                 WHERE mj.TANGGAL LIKE '%$tanggal_Baru%'
                                                 and mj.TA = '$TA' and mj.KELAS = '$Kelas' and dj.AKTIFITAS = 'Praktikum'"
        )->queryAll();

        if($Query_Sesi){
            foreach($Query_Sesi as $itemQuerySesi){
                $listHariSesi[$indexSesi] = $day."-".$itemQuerySesi['SESSION'];
                $sesi = $itemQuerySesi['SESSION'];

                $cekT[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Teori'"
                )->queryAll();
                if($cekT[$indexSesi]){
                    foreach($cekT[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirT++;
                    }
                }

                $cekP[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Praktikum'"
                )->queryAll();
                if($cekP[$indexSesi]){
                    foreach($cekP[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirP++;
                    }
                }
                $indexSesi++;
            }
        } else {
            $listHariSesi = null;
            $hadirDinT = null;
            $hadirDinP = null;
            $absenDinT = null;
            $absenDinP = null;
        }
    }
} else if($day == 'Wednesday'){
    $jmlHariSebelum = 2;
    $indexSesi = 0;
    $indekDinHadirT = 0;
    $indekDinHadirP = 0;

    for($index = (0 - $jmlHariSebelum); $index <= 0; $index++){
        $param = $index." day";
        $newdate = strtotime($param, strtotime($date));
        $tanggal_Baru = date('Y-m-d', $newdate);
        $timestamp = strtotime($tanggal_Baru);
        $day = date('l', $timestamp);

        /* -- Query mencari sesi yang ada pada tanggal -- */
        $Query_Sesi = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                 JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                 WHERE mj.TANGGAL LIKE '%$tanggal_Baru%'
                                                 and mj.TA = '$TA' and mj.KELAS = '$Kelas' and dj.AKTIFITAS = 'Praktikum'"
        )->queryAll();

        if($Query_Sesi){
            foreach($Query_Sesi as $itemQuerySesi){
                $listHariSesi[$indexSesi] = $day."-".$itemQuerySesi['SESSION'];
                $sesi = $itemQuerySesi['SESSION'];

                $cekT[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Teori'"
                )->queryAll();
                if($cekT[$indexSesi]){
                    foreach($cekT[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirT++;
                    }
                }

                $cekP[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Praktikum'"
                )->queryAll();
                if($cekP[$indexSesi]){
                    foreach($cekP[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirP++;
                    }
                }
                $indexSesi++;
            }
        } else {
            $listHariSesi = null;
            $hadirDinT = null;
            $hadirDinP = null;
            $absenDinT = null;
            $absenDinP = null;
        }
    }
} else if($day == 'Thursday'){
    $jmlHariSebelum = 3;
    $indexSesi = 0;
    $indekDinHadirT = 0;
    $indekDinHadirP = 0;

    for($index = (0 - $jmlHariSebelum); $index <= 0; $index++){
        $param = $index." day";
        $newdate = strtotime($param, strtotime($date));
        $tanggal_Baru = date('Y-m-d', $newdate);
        $timestamp = strtotime($tanggal_Baru);
        $day = date('l', $timestamp);

        /* -- Query mencari sesi yang ada pada tanggal -- */
        $Query_Sesi = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                 JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                 WHERE mj.TANGGAL LIKE '%$tanggal_Baru%'
                                                 and mj.TA = '$TA' and mj.KELAS = '$Kelas' and dj.AKTIFITAS = 'Praktikum'"
        )->queryAll();

        if($Query_Sesi){
            foreach($Query_Sesi as $itemQuerySesi){
                $listHariSesi[$indexSesi] = $day."-".$itemQuerySesi['SESSION'];
                $sesi = $itemQuerySesi['SESSION'];

                $cekT[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Teori'"
                )->queryAll();
                if($cekT[$indexSesi]){
                    foreach($cekT[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirT++;
                    }
                }

                $cekP[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Praktikum'"
                )->queryAll();
                if($cekP[$indexSesi]){
                    foreach($cekP[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirP++;
                    }
                }
                $indexSesi++;
            }
        } else {
            $listHariSesi = null;
            $hadirDinT = null;
            $hadirDinP = null;
            $absenDinT = null;
            $absenDinP = null;
        }
    }
} else if($day == 'Friday'){
    $jmlHariSebelum = 4;
    $indexSesi = 0;
    $indekDinHadirT = 0;
    $indekDinHadirP = 0;

    for($index = (0 - $jmlHariSebelum); $index <= 0; $index++){
        $param = $index." day";
        $newdate = strtotime($param, strtotime($date));
        $tanggal_Baru = date('Y-m-d', $newdate);
        $timestamp = strtotime($tanggal_Baru);
        $day = date('l', $timestamp);

        /* -- Query mencari sesi yang ada pada tanggal -- */
        $Query_Sesi = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                 JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                 WHERE mj.TANGGAL LIKE '%$tanggal_Baru%'
                                                 and mj.TA = '$TA' and mj.KELAS = '$Kelas' and dj.AKTIFITAS = 'Praktikum'"
        )->queryAll();

        if($Query_Sesi){
            foreach($Query_Sesi as $itemQuerySesi){
                $listHariSesi[$indexSesi] = $day."-".$itemQuerySesi['SESSION'];
                $sesi = $itemQuerySesi['SESSION'];

                $cekT[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Teori'"
                )->queryAll();
                if($cekT[$indexSesi]){
                    foreach($cekT[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirT++;
                    }
                }

                $cekP[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Praktikum'"
                )->queryAll();
                if($cekP[$indexSesi]){
                    foreach($cekP[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirP++;
                    }
                }
                $indexSesi++;
            }
        } else {
            $listHariSesi = null;
            $hadirDinT = null;
            $hadirDinP = null;
            $absenDinT = null;
            $absenDinP = null;
        }
    }
} else if($day == 'Saturday'){
    $jmlHariSebelum = 5;
    $indexSesi = 0;
    $indekDinHadirT = 0;
    $indekDinHadirP = 0;

    for($index = (0 - $jmlHariSebelum); $index <= 0; $index++){
        $param = $index." day";
        $newdate = strtotime($param, strtotime($date));
        $tanggal_Baru = date('Y-m-d', $newdate);
        $timestamp = strtotime($tanggal_Baru);
        $day = date('l', $timestamp);

        /* -- Query mencari sesi yang ada pada tanggal -- */
        $Query_Sesi = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                 JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                 WHERE mj.TANGGAL LIKE '%$tanggal_Baru%'
                                                 and mj.TA = '$TA' and mj.KELAS = '$Kelas' and dj.AKTIFITAS = 'Praktikum'"
        )->queryAll();

        if($Query_Sesi){
            foreach($Query_Sesi as $itemQuerySesi){
                $listHariSesi[$indexSesi] = $day."-".$itemQuerySesi['SESSION'];
                $sesi = $itemQuerySesi['SESSION'];

                $cekT[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Teori'"
                )->queryAll();
                if($cekT[$indexSesi]){
                    foreach($cekT[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirT++;
                    }
                }

                $cekP[$indexSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_Baru' and dj.AKTIFITAS = 'Praktikum'"
                )->queryAll();
                if($cekP[$indexSesi]){
                    foreach($cekP[$indexSesi] as $itemJadwal){
                        $ID_dJadwal = $itemJadwal["ID_DETAIL_JADWAL"];
                        $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'H'));
                        $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$ID_dJadwal, 'STATUS'=>'A'));
                        $indekDinHadirP++;
                    }
                }
                $indexSesi++;
            }
        } else {
            $listHariSesi = null;
            $hadirDinT = null;
            $hadirDinP = null;
            $absenDinT = null;
            $absenDinP = null;
        }
    }
} else {
    echo "Silahkan pilih tanggal / hari lainnya";
}
?>
<?php
    if($listHariSesi != null){
?>
<table border="1">
    <tr>
        <td>No. </td>
        <td>Hari / Sesi</td>
        <td>Jumlah Kehadiran</td>
        <td>Jumlah Ketidakhadiran</td>
    </tr>
    <?php
    $nomor = 1;
    foreach($listHariSesi as $itemSesi){
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $itemSesi; ?></td>
            <td><?php echo $hadirDinP[$nomor-1]; ?></td>
            <td><?php echo $absenDinP[$nomor-1]; ?></td>
        </tr>
        <?php
        $nomor++;
    }

    ?>
</table>
<?php } else { echo "Data tidak ditemukan"; } ?>