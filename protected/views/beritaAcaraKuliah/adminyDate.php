<?php ?>


<table style="border-collapse:collapse;background:white">
    <tr>
        <td style="background:#cccccc;width:5%;">
            <h2>Choose the Date!</h2><hr>
        </td>
        <td style="background:#e4e4e4;width:25%;">
    <center><?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?></center>
</td>
<td>&nbsp;</td>
<td style="width:75%;" align="right" valign="middle" border="4" >             
    <h2>
        <center>Laporan Berita Acara tanggal <BR><?php echo $wew ?></center>
    </h2>
    <hr>
    <?php
    $this->widget('booster.widgets.TbGridView', array(
        'type' => 'striped bordered condensed',
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'columns' => array(
            //'ID',
            array(
                'header' => 'Minggu',
                'value' => '$data->iddetailjadwal->idjadwal->WEEK',
            ),
            array(
                'header' => 'Sesi',
                'value' => '$data->iddetailjadwal->SESSION',
            ),
            //'START_TIME',
            //'END_TIME',
//                            'TA',
//                            'ID_KUR',
            array(
                'header' => 'Kelas',
                'value' => '$data->iddetailjadwal->idjadwal->KELAS',
            ),
            array(
                'header' => 'Tanggal',
                'value' => '$data->iddetailjadwal->idjadwal->TANGGAL',
            ),
            //'TOPIK',
            array(
                'header' => 'Ruangan',
                'value' => '$data->iddetailjadwal->RUANGAN',
            ),
            array(
                'header' => 'Aktifitas',
                'value' => '$data->iddetailjadwal->AKTIFITAS'
            ),
            /* 'TIPE_KULIAH',
              'CATATAN',
              'KETERANGAN',
              'LAST_UPDATE',
              'USER_ID',
              'WS',
              'WAKTU_ABSEN',
              // */
            array(
                'header' => 'Aksi',
                'class' => 'booster.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</td>

</tr>
</table>

