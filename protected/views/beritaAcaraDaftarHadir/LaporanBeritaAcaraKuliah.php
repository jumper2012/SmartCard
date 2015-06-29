<?php
$tempMessage = explode("-", $message);
$mata_kuliah = $tempMessage[0];
$kelas = $tempMessage[1];
$TAjaran = $tempMessage[2];
$semester = $tempMessage[3];

$modelX = Yii::app()->db->createCommand('SELECT distinct NIM FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE  mj.TA = "' . $TAjaran . '" and dj.KODE_MK = "' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
$angkatan = "";
foreach ($modelX as $itemX) {
    $angkatanX = Dim::model()->findByAttributes(array('NIM' => $itemX['NIM']));
    $angkatan = $angkatanX->THN_MASUK;
}

$imagePath = Yii::getPathOfAlias('application.icons');
$baseUrl = Yii::app()->assetManager->publish($imagePath);
?>

<table>
    <tr>
        <td align="left" colspan="3" width="950">
            Institut Teknologi Del <br/>
            Jl. Sisingamangaraja, Sitoluama, Laguboti <br/>
            Toba Samosir, Sumatera Utara 22381 <br/>
            Telp. 0632-331234 <br/><br/>
        </td>
        <td width="130">
            <?php echo CHtml::image($imagePath . '/logo_itd.jpg', "", array('width' => 80, 'height' => 85)); ?>
        </td>
    </tr>
    <tr>
        <td colspan="4"><b>Daftar Hadir Mahasiswa Semester <?php echo $semester; ?> T.A <?php
                echo $TAjaran . "/";
                echo"" . ((int) $TAjaran) + 1;
                ?></b></td>
    </tr>
    <tr>
        <td align="left"><b>Mata Kuliah</b></td>
        <td width="20" align="center"> : </td>
        <td width="750" align="left">
            <b>
                <?php
                $mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $mata_kuliah));
                echo $mk->NAMA_KUL_IND;
                ?>
            </b>
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="left"><b>Jumlah SKS</b></td>
        <td align="center"> : </td>
        <td align="left"><b><?php echo $mk->SKS; ?></b></td>
        <td></td>
    </tr>
    <tr>
        <td align="left"><b>Dosen</b></td>
        <td align="center"> : </td>
        <td align="left">
            <b>
                <?php
                $tempPengajar = Yii::app()->db->createCommand('select * from pengajar where KODE_MK = "' . $mata_kuliah . '"')->queryAll();
                $id_pengajar = array();
                $indexPengajar = 0;
                $nama_pengajar_arr = array();
                $namaDosen = array();
                $indexNama = 0;

                foreach ($tempPengajar as $itemPengajar) {
                    $id_pengajar[$indexPengajar] = $itemPengajar['DOSEN_ID'];
                    $nama_pengajar_arr[$indexPengajar] = Yii::app()->db->createCommand('select NAMA from pegawai where ID = "' . $id_pengajar[$indexPengajar] . '"')->queryAll();
                    foreach ($nama_pengajar_arr[$indexPengajar] as $itemNamaP) {
                        $namaDosen[$indexNama] = $itemNamaP['NAMA'];
                        $indexNama++;
                    }
                    $indexPengajar++;
                }

                $namaDosenMK = "";

                if ($indexNama == 3) {
                    $namaDosenMK = "" . $namaDosen[0] . " / " . $namaDosen[1] . " / " . $namaDosen[2];
                } else if ($indexNama == 2) {
                    $namaDosenMK = "" . $namaDosen[0] . " / " . $namaDosen[1];
                } else {
                    $namaDosenMK = "" . $namaDosen[0];
                }
                echo $namaDosenMK;
                ?>
            </b>
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="left"><b>Instruktur / TA</b></td>
        <td align="center"> : </td>
        <td align="left"><b></b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Angkatan / Kelas</b></td>
        <td align="center"> : </td>
        <td align="left"><b><?php echo $angkatan . "/" . $kelas; ?></b></td>
        <td></td>
    </tr>
</table>

<br/>

<table cellpadding="0" cellspacing="0" style="font-size: 11px;">
    <tr>
        <td colspan="4"></td>
        <td align="center" border="0.5" colspan="100"><b>Paraf</b></td>
    </tr>
    <tr>
        <td align="center" border="0.5" width="30" rowspan="4">No.</td>
        <td align="center" width="70" border="0.5" rowspan="4">NIM</td>
        <td align="center" width="120" border="0.5" rowspan="4">Nama</td>
    </tr>
    <tr>
        <td width="50" border="0.5" align="center">TGL</td>
        <?php
        $DistinctTanggal = Yii::app()->db->createCommand('SELECT DISTINCT mj.TANGGAL FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TA = "' . $TAjaran . '" and dj.KODE_MK = "' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
        foreach ($DistinctTanggal as $itemDTanggal) {
            $countSessionByDate = Yii::app()->db->createCommand('SELECT DISTINCT dj.SESSION FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID  WHERE mj.TANGGAL = "' . $itemDTanggal['TANGGAL'] . '" AND dj.KODE_MK="' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
            foreach ($countSessionByDate as $itemCSBD) {
                ?>
                <td border="0.5" width="60" align="center" style="font-size: 10px;"><?php echo $itemDTanggal['TANGGAL']; ?></td>
                <?php
            }
        }
        ?>
    </tr>
    <tr>
        <td width="50" border="0.5" align="center">PUKUL</td>
        <?php
        $DistinctTanggal = Yii::app()->db->createCommand('SELECT DISTINCT mj.TANGGAL FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TA = "' . $TAjaran . '" and dj.KODE_MK = "' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
        foreach ($DistinctTanggal as $itemDTanggal) {
            $countSessionByDate = Yii::app()->db->createCommand('SELECT DISTINCT dj.START_TIME FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TANGGAL = "' . $itemDTanggal['TANGGAL'] . '" AND dj.KODE_MK="' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
            foreach ($countSessionByDate as $itemCSBD) {
                ?>
                <td border="0.5" width="50" align="center"><?php echo $itemCSBD['START_TIME']; ?></td>
                <?php
            }
        }
        ?>
    </tr>
    <tr>
        <td width="40" border="0.5" align="center">SESI</td>
        <?php
        $DistinctTanggal = Yii::app()->db->createCommand('SELECT DISTINCT mj.TANGGAL FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TA = "' . $TAjaran . '" and dj.KODE_MK = "' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
        foreach ($DistinctTanggal as $itemDTanggal) {
            $countSessionByDate = Yii::app()->db->createCommand('SELECT DISTINCT dj.SESSION FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TANGGAL = "' . $itemDTanggal['TANGGAL'] . '" AND dj.KODE_MK="' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
            foreach ($countSessionByDate as $itemCSBD) {
                ?>
                <td border="0.5" width="30" align="center"><?php echo $itemCSBD['SESSION'] ?></td>
                <?php
            }
        }
        ?>
    </tr>  
    <?php
    $model = Yii::app()->db->createCommand('SELECT distinct NIM FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE  mj.TA = "' . $TAjaran . '" and dj.KODE_MK = "' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
    $no = 1;
    foreach ($model as $modelN) {
        ?>
        <tr>
            <td border="0.5" align="center"><?php echo $no; ?></td>
            <td border="0.5" align="center"><?php echo $modelN['NIM']; ?></td>
            <td border="0.5" align=left" colspan="2">
                <?php
                $modelNama = Dim::model()->findByAttributes(array('NIM' => $modelN['NIM']));
                echo $modelNama->NAMA;
                ?>
            </td>
            <?php
            $DistinctTanggal = Yii::app()->db->createCommand('SELECT DISTINCT mj.TANGGAL FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TA = "' . $TAjaran . '" and dj.KODE_MK = "' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
            foreach ($DistinctTanggal as $itemDTanggal) {
                $countSessionByDate = Yii::app()->db->createCommand('SELECT DISTINCT dj.SESSION FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID WHERE mj.TANGGAL = "' . $itemDTanggal['TANGGAL'] . '" AND dj.KODE_MK="' . $mata_kuliah . '" and mj.KELAS = "' . $kelas . '"')->queryAll();
                foreach ($countSessionByDate as $itemCSBD) {
                    ?>
                    <td border="0.5" width="30" align="center">
                        <?php
//                        $hasil = BeritaAcaraDaftarHadir::model()->findAllBySql(" SELECT * FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
//                                                                WHERE mj.`TA`= '$TAjaran' AND dj.`KODE_MK` = '$mata_kuliah' AND mj.`KELAS` = '$kelas'");
                        $modelnim = $modelN['NIM'];
                        $tggl = $itemDTanggal['TANGGAL'];
                        $sesi = $itemCSBD['SESSION'];
                        $modelStatus = BeritaAcaraDaftarHadir::model()->findBySql("SELECT * FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TAjaran' AND dj.`KODE_MK` = '$mata_kuliah' AND mj.`KELAS` = '$kelas' AND badh.NIM = '$modelnim' AND mj.TANGGAL = '$tggl' AND dj.SESSION = '$sesi'");

//                        
                        if (!empty($modelStatus->STATUS)) {
                            echo ($modelStatus->STATUS == "A" ? "-" : "Hadir");
                        };
                        ?>
                    </td>
                    <?php
                }
            }
            ?>
        </tr>
        <?php
        $no++;
    }
    ?>
</table>