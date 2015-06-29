<div class="page-header">
    <h1>Lihat Detail Jadwal<small> &nbsp;&nbsp;&nbsp;<?php echo "Tanggal : " . $model->idjadwal->TANGGAL . " , Kelas : " . $model->idjadwal->KELAS ?></small></h1>
</div>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'berita-acara-daftar-hadir-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        'SESSION',
        'START_TIME',
        'END_TIME',
        array(
            'header' => 'KODE_MK',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->KODE_MK), "https://akademik.del.ac.id/?menu=BrowseKuliah&submenu=detail&ID_KUR=".CHtml::encode($data->kodemk->ID_KUR)."&KODE_MK=".CHtml::encode($data->KODE_MK))',
        ),
        array(
            'header' => 'Mata Kuliah',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->kodemk->NAMA_KUL_IND), "https://akademik.del.ac.id/?menu=BrowseKuliah&submenu=detail&ID_KUR=".CHtml::encode($data->kodemk->ID_KUR)."&KODE_MK=".CHtml::encode($data->KODE_MK))',
        ),
        'RUANGAN',
        'AKTIFITAS',
        array(
            'header' => 'Pengajar',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->pic->NAMA), "https://akademik.del.ac.id/?menu=BrowseProfileBrief&submenu=default&ID=".CHtml::encode($data->PIC))',
        ),
//        array(
//            'header' => 'Aksi',
//            'class' => 'booster.widgets.TbButtonColumn',
//            'template' => '{view}{update}{delete}',
//            'viewButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->ID.\'\'))',
//            'updateButtonUrl' => 'Yii::app()->createUrl(\'djadwal/update\',array(\'id\'=>\'\'.$data->ID.\'\'))',
//            'deleteButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->ID.\'\'))',
////            'buttons' => array(
////                'delete' => array(
////                    'click' => 'function(){return false;}'
////                )
////            )
//        ),
    ),
));
?>

<?php
//$this->widget('booster.widgets.TbDetailView', array(
//    'data' => $model,
//    'attributes' => array(
//        array(
//            'header' => 'Sesi',
//            'name' => 'Sesi',
//            'value' => $model->SESSION,
//        ),
//        array(
//            'header' => 'Waktu Mulai',
//            'name' => 'Waktu Mulai',
//            'value' => $model->START_TIME,
//        ),
//        array(
//            'header' => 'Waktu Selesai',
//            'name' => 'Waktu Selesai',
//            'value' => $model->END_TIME,
//        ),
//        array(
//            'header' => 'Kode Mata Kuliah',
//            'name' => 'Kode Mata Kuliah',
//            'value' => $model->KODE_MK,
//        ),
//        array(
//            'header' => 'Ruangan',
//            'name' => 'Ruangan',
//            'value' => $model->RUANGAN,
//        ),
//        array(
//            'header' => 'Aktifitas',
//            'name' => 'Aktifitas',
//            'value' => $model->AKTIFITAS,
//        ),
//        array(
//            'header' => 'Pengajar',
//            'name' => 'Pengajar',
//            'value' => $model->pic->NAMA,
//        ),
//    ),
//));
?>


<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'berita-acara-daftar-hadir-grid',
    'dataProvider' => $daftarhadir,
    'columns' => array(
        array(
            'header' => 'NIM',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->NIM), "https://akademik.del.ac.id/?menu=BrowseDIM&submenu=detail&nim=".CHtml::encode($data->NIM))',
        ),
        array(
            'header' => 'Nama',
            'name' => 'Nama',
            'value' => '$data->nim->NAMA'
        ),
        array(
            'header' => 'Status',
            'name' => 'Status',
            'type' => 'raw',
            'value' => '($data->STATUS) == "A"? "Absen":"Hadir"'
        ),
        'WAKTU_ABSEN'
    ),
));
?>


