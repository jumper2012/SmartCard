<?php ?>
<table>
    <tr>
        <td>
            <p>Choose the Date!<p><hr>
            <?php $this->widget('ext.simple-calendar.SimpleCalendarWidget');
            ?>
        </td>

        <td>                
            <blockquote>
                <h2>
                    Laporan Berita Acara tanggal <?php echo $wew ?>
                </h2>
                <hr>
                <?php
                $this->widget('booster.widgets.TbGridView', array(
                    'type' => 'striped bordered condensed',
                    'dataProvider' => $dataProvider,
                    'template' => "{items}",
                    'columns' => array(
                        //'ID',
                        'WEEK',
                        'SESSION',
                        //'START_TIME',
                        //'END_TIME',
                        'TA',
                        'ID_KUR',
                        'KELAS',
                        'TANGGAL',
                        'TOPIK',
                        'RUANGAN',
                        'AKTIFITAS',
                        'TIPE_KULIAH',
                        'CATATAN',
                        /* 'KETERANGAN',
                          'LAST_UPDATE',
                          'USER_ID',
                          'WS',
                          'WAKTU_ABSEN',
                          // */
                        array(
                            'class' => 'booster.widgets.TbButtonColumn',
                        ),
                    ),
                ));
                ?>
            </blockquote>                


        </td>

    <tr>
</table>

