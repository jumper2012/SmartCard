<?php
$tempMessage = explode("-", $message);
$T_A = $tempMessage[0];
$Kode_MK = $tempMessage[1];
$Kelas = $tempMessage[2];
$sem = $tempMessage[3];

$imagePath = Yii::getPathOfAlias('application.icons');
$baseUrl = Yii::app()->assetManager->publish($imagePath);

$mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode_MK));

$tempPengajar = Yii::app()->db->createCommand('select * from pengajar where KODE_MK = "' . $Kode_MK . '"')->queryAll();
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

$jumlahData = BeritaAcaraKuliah::model()->countBySql('select COUNT(*) from berita_acara_kuliah bak JOIN d_jadwal dj ON bak.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID where dj.KODE_MK = "' . $Kode_MK . '" and mj.KELAS = "' . $Kelas . '" and mj.TA = "' . $T_A . '"');

$list = Yii::app()->db->createCommand('select * from berita_acara_kuliah bak JOIN d_jadwal dj ON bak.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID where dj.KODE_MK = "' . $Kode_MK . '" and mj.KELAS = "' . $Kelas . '" and mj.TA = "' . $T_A . '"')->queryAll();
//var_dump($jmlHadir);
$mingguSesi = array();
$waktu_mulai = array();
$waktu_selesai = array();
$tanggal = array();
$hari = array();
$ruangan = array();
$tipe_kuliah = array();
$topik = array();

$jmlHadirH_temp = array();
$jmlAbsenA_temp = array();

$tipe_reguler = "";
$tipe_pengganti = "";
$index = 0;
foreach ($list as $item) {
    $tanggal[$index] = $item['TANGGAL'];
    $timestamp = strtotime($item['TANGGAL']);
    $hari[$index] = date('l', $timestamp);
    $waktu_mulai[$index] = $item['START_TIME'];
    $waktu_selesai[$index] = $item['END_TIME'];
    $mingguSesi[$index] = $item['WEEK'] . " / " . $item['SESSION'];
    $ruangan[$index] = $item['RUANGAN'];
    $tipe_kuliah[$index] = $item['TIPE_KULIAH'];
    $topik[$index] = $item['TOPIK'];
    $sem = $tempMessage[3];
    //echo $mingguSesi[$index];
    $jmlAbsenA_temp[$index] = Yii::app()->db->createCommand('
            SELECT COUNT(*) 
            FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID
            WHERE STATUS = "A" AND mj.WEEK = "' . $item['WEEK'] . '"  
            AND dj.SESSION = "' . $item['SESSION'] . '"
            AND dj.KODE_MK = "' . $Kode_MK . '" 
            AND mj.KELAS = "' . $Kelas . '"
            AND mj.TANGGAL="' . $item['TANGGAL'] . '"')->queryAll();

    $jmlHadirH_temp[$index] = Yii::app()->db->createCommand('
            SELECT COUNT(*) 
            FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID
            WHERE STATUS = "H" AND mj.WEEK = "' . $item['WEEK'] . '"  
            AND dj.SESSION = "' . $item['SESSION'] . '"
            AND dj.KODE_MK = "' . $Kode_MK . '" 
            AND mj.KELAS = "' . $Kelas . '"
            AND mj.TANGGAL="' . $item['TANGGAL'] . '"')->queryAll();

    $index++;
}
/* Konversi tanggal ke hari */
$timestamp = strtotime('2009-10-22');
$day = date('l', $timestamp);
//var_dump($day);
/* End */
?>

<table>
    <tr>
        <td align="center" valign="middle" border="1">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100">
                        <?php echo CHtml::image($imagePath . '/logo_itd.jpg', "", array('width' => 80, 'height' => 85)); ?>
                    </td>
                    <td></td>
                    <td align="center" style="font-size: 10px;">
                        INSTITUT TEKNOLOGI DEL<br/>
                        Jl. Sisingamangaraja, Sitoluama, Laguboti, Toba Samosir, Sumatera Utara 22381, Telp.0632-331234<br/><br/>
                        BERITA ACARA KULIAH
                    </td>
                </tr>
                <tr>
                    <td></td><td></td><td></td>
                </tr>
                <tr>
                    <td style="font-size: 10px;" align="left">Mata Kuliah</td>
                    <td>:</td>
                    <td style="font-size: 10px;" align="left"><?php echo $mk->NAMA_KUL_IND; ?></td>
                </tr>
                <tr>
                    <td style="font-size: 10px;" align="left">Nama Dosen</td>
                    <td>:</td>
                    <td style="font-size: 10px;" align="left"><?php echo $namaDosenMK; ?></td>
                </tr>
                <tr>
                    <td style="font-size: 10px;" align="left">Sem</td>
                    <td>:</td>
                    <td style="font-size: 10px;" align="left"><?php echo $sem; ?></td>
                </tr>
                <tr>
                    <td style="font-size: 10px;" align="left">Angkatan/Kelas</td>
                    <td>:</td>
                    <td style="font-size: 10px;" align="left"><?php echo $Kelas; ?></td>
                </tr>
            </table>
            <br/>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td border="0.5">
                        <table style="font-size: 10px;" cellpadding="0" cellspacing="0">
                            <tr>
                                <td border="0.5" colspan="3" align="center" width="150">KEHADIRAN</td>
                                <td border="0.5" colspan="9" width="270" align="center">MATERI YANG DIBERIKAN</td>
                                <td border="0.5" width="70" align="center">JML MHS</td>
                                <td border="0.5" align="center" width="100">NAMA & PARAF <br/>KETUA KELAS</td>
                                <td border="0.5" align="center" width="100">NAMA & PARAF <br/>DOSEN</td>
                            </tr>
                            <?php
                            for ($index2 = 0; $index2 < $jumlahData; $index2++) {
                                ?>
                                <tr>
                                    <td border="0.5" align="center">Hari</td>
                                    <td border="0.5" colspan="2">
                                        <?php
                                        if ($hari[$index2] == 'Monday') {
                                            echo "Senin";
                                        } else if ($hari[$index2] == 'Tuesday') {
                                            echo "Selasa";
                                        } else if ($hari[$index2] == 'Wednesday') {
                                            echo "Rabu";
                                        } else if ($hari[$index2] == 'Thursday') {
                                            echo "Kamis";
                                        } else if ($hari[$index2] == 'Friday') {
                                            echo "Jumat";
                                        } else {
                                            echo "Unknown";
                                        }
                                        ?>
                                    </td>
                                    <td border="0.5" colspan="9" rowspan="4"><?php echo $topik[$index2]; ?></td>
                                    <td border="0.5" align="left">
                                        <table cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="35">Hadir</td>
                                                <td>:</td>
                                                <td>
                                                    <?php
                                                    foreach ($jmlHadirH_temp[$index2] as $itemH) {
                                                        echo "" . $itemH['COUNT(*)'];
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td border="0.5" rowspan="4"></td>
                                    <td border="0.5" rowspan="4"></td>
                                </tr>
                                <tr>
                                    <td align="center" border="0.5">Tanggal</td>
                                    <td colspan="2" border="0.5"><?php echo $tanggal[$index2]; ?></td>
                                    <td border="0.5" align="left">
                                        <table cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="35">Izin</td>
                                                <td>:</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" border="0.5" rowspan="2">Jam Kuliah</td>
                                    <td border="0.5" align="left">Mulai</td>
                                    <td border="0.5">Selesai</td>
                                    <td border="0.5" align="left"><table cellspacing="0" cellpadding="0"><tr><td width="35">Sakit</td><td>:</td><td></td></tr></table></td>
                                </tr>
                                <tr>
                                    <td border="0.5"><?php echo $waktu_mulai[$index2]; ?></td>
                                    <td border="0.5"><?php echo $waktu_selesai[$index2]; ?></td>
                                    <td border="0.5" align="left">
                                        <table cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="35">Absen</td>
                                                <td>:</td>
                                                <td>
                                                    <?php
                                                    foreach ($jmlAbsenA_temp[$index2] as $itemA) {
                                                        echo "" . $itemA['COUNT(*)'];
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php
                                if ($tipe_kuliah[$index2] == 'Regular') {
                                    $tipe_reguler = "X";
                                    $tipe_pengganti = "   ";
                                } else {
                                    $tipe_reguler = "   ";
                                    $tipe_pengganti = "X";
                                }
                                ?>
                                <tr>
                                    <td align="center" border="0.5">Minggu/Sesi</td>
                                    <td colspan="2" border="0.5"><?php echo $mingguSesi[$index2]; ?></td>
                                    <td width="0"></td>
                                    <td border="2" width="0"><?php echo "<b>" . $tipe_reguler . "</b>"; ?></td>
                                    <td width="30">Regular</td>
                                    <td width="2"></td>
                                    <td border="2" width="0"><?php echo "<b>" . $tipe_pengganti . "</b>"; ?></td>
                                    <td width="35">Pengganti</td>
                                    <td></td>
                                    <td width="5"></td>
                                    <td>Ruang : <?php echo $ruangan[$index2]; ?></td>
                                    <td></td>
                                    <td colspan="2" border="0.5" align="left">Paraf Petugas BAA : </td>
                                </tr>
                            <?php } ?>
                        </table>   
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
