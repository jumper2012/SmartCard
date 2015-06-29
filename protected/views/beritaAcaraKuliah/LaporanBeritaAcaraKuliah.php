<?php
$kelas = "41B";
$mata_kuliah = "IF411111";
$model = BeritaAcaraDaftarHadir::model()->findAllByAttributes(array('TANGGAL' => $message, 'KODE_MK' => $mata_kuliah));
$model2 = Jadwal::model()->findAllByAttributes(array('TANGGAL' => $message, 'KODE_MK' => $mata_kuliah));
$model3 = BeritaAcaraDaftarHadir::model()->findAllByAttributes(array('TANGGAL' => $message, 'KODE_MK' => $mata_kuliah));
$mkul = Kurikulum::model()->findByAttributes(array('KODE_MK' => $mata_kuliah));
$dosen = Pengajar::model()->findByAttributes(array('KODE_MK' => $mata_kuliah));
$criteriaDataIb = new CDbCriteria();
$criteriaDataIb->condition = 'KODE_MK = :kodemk';
$criteriaDataIb->order = 'ID DESC';
$criteriaDataIb->limit = 1;
$criteriaDataIb->params = array('kodemk' => $mata_kuliah);
$tajaran = Jadwal::model()->find($criteriaDataIb);

$imagePath = Yii::getPathOfAlias('application.icons');
$baseUrl = Yii::app()->assetManager->publish($imagePath);
?>
<table>
    <tr>
        <td>
            Institut Teknologi Del <br/>
            Jl. Sisingamangaraja, Sitoluama, Laguboti <br/>
            Toba Samosir, Sumatera Utara 22381 <br/>
            Telp. 0632-331234
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
            <h4><b>Daftar Hadir Mahasiswa Semester 1 T.A 2013/2014</b></h4>
            <b>
                <table>
                    <tr>
                        <td width="150">Mata Kuliah</td>
                        <td> : </td>
                        <td><?php echo $mkul->NAMA_KUL_IND; ?></td>
                    </tr>
                    <tr>
                        <td width="150">Jumlah SKS</td>
                        <td> : </td>
                        <td><?php echo $mkul->SKS; ?></td>
                    </tr>
                    <tr>
                        <td width="150">Dosen</td>
                        <td> : </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="150">Instruktur / TA</td>
                        <td> : </td>
                        <td><?php echo $tajaran->TA; ?></td>
                    </tr>
                    <tr>
                        <td width="150">Angkatan / Kelas</td>
                        <td> : </td>
                        <td></td>
                    </tr>
                </table>
            </b>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
<br/>


<table cellpadding="0" cellspacing="0" border="1">
    <tr>
        <td colspan="4"></td>
        <td colspan="19">Paraf</td>
    </tr>
    <tr>
        <td rowspan="4" width="30">No.</td>
        <td rowspan="4" width="90">NIM</td>
        <td rowspan="4" width="180">Nama</td>
    </tr>
    <tr style="background-color:gray";>
        <td width="70">TGL</td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
    </tr>
    <tr style="background-color:gray";>
        <td width="70">PUKUL</td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
        <td width="50"></td>
    </tr>
    <tr style="background-color:gray";>
        <td width="70">SESI</td>
        <?php
        foreach ($model2 as $item2) {
            ?>
            <td width="30"><?php echo $item2['SESSION']; ?></td>
            <?php
        }
        ?>
    </tr>
    <?php
    $x = 1;
    foreach ($model as $item) {
        ?>
        <tr>
            <td><?php echo $x; ?></td>
            <td><?php echo $item['NIM']; ?></td>
            <td colspan="2"><?php
                $nama = Dim::model()->findByAttributes(array('NIM' => $item['NIM']));
                echo $nama->NAMA;
                ?></td>
            <td><?php echo $item['STATUS'] ?></td>
            <td><?php echo $item['STATUS'] ?></td>
            <td><?php echo $item['STATUS'] ?></td>

        </tr>
        <?php
        $x += 1;
    }
    ?>

</table>