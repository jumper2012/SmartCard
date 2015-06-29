<?php ?>

<div class="page-header">
    <h1>Lihat Jadwal</h1>
</div>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'berita-acara-daftar-hadir-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        array(
            'header' => 'Minggu',
            'value' => '$data->WEEK'
        ),
        'TANGGAL',
        array(
            'header' => 'Kurikulum',
            'value' => '$data->ID_KUR'
        ),
        array(
            'header' => 'Tahun Ajaran',
            'value' => '$data->TA'
        ),
        array(
            'header' => 'Kelas',
            'value' => '$data->KELAS'
        ),
        array(
            'header' => 'Aksi',
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}',
//            'viewButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->ID.\'\'))',
//            'updateButtonUrl' => null,
//            'deleteButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->ID.\'\'))',
//            'buttons' => array(
//                'delete' => array(
//                    'click' => 'function(){return false;}'
//                )
//            )
        ),
    ),
));
?>

<?php
//$this->widget('booster.widgets.TbDetailView', array(
//    'data' => $model,
//    'attributes' => array(
//        array(
//            'header' => 'Minggu',
//            'name' => 'Minggu',
//            'value' => $model->WEEK,
//        ),
//        'TANGGAL',
//        array(
//            'header' => 'Tahun Ajaran',
//            'name' => 'Tahun Ajaran',
//            'value' => $model->TA,
//        ),
//        array(
//            'header' => 'Kurikulum',
//            'name' => 'Kurikulum',
//            'value' => $model->ID_KUR,
//        ),
//        'KELAS',
//    ),
//));
?>

<!--<div style="text-align:right;">

<?php // echo CHtml::button('Perbaharui', array('submit' => array('update', 'id' => $model->ID), 'class' => 'btn btn-small btn-warning')) ?>
</div>-->

<!--<BR>
<h3 class="header">Jadwal Yang Ada
    <span class="header-line"></span> </h3>-->
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'berita-acara-daftar-hadir-grid',
    'dataProvider' => $detail,
    'columns' => array(
        'SESSION',
        'START_TIME',
        'END_TIME',
        array(
            'header' => 'KODE_MK',
            'type' => 'raw',
//            'value' => 'CHtml::link($data->KODE_MK,\'https://akademik.del.ac.id/?menu=BrowseKuliah&submenu=detail&ID_KUR=$data->kodemk->ID_KUR&KODE_MK=$data->KODE_MK\')',
            'value' => 'CHtml::link(CHtml::encode($data->KODE_MK), "https://akademik.del.ac.id/?menu=BrowseKuliah&submenu=detail&ID_KUR=".CHtml::encode($data->kodemk->ID_KUR)."&KODE_MK=".CHtml::encode($data->KODE_MK))',
        ),
        array(
            'header' => 'Mata Kuliah',
            'type' => 'raw',
//            'value' => 'CHtml::link($data->KODE_MK,\'https://akademik.del.ac.id/?menu=BrowseKuliah&submenu=detail&ID_KUR=$data->kodemk->ID_KUR&KODE_MK=$data->KODE_MK\')',
            'value' => 'CHtml::link(CHtml::encode($data->kodemk->NAMA_KUL_IND), "https://akademik.del.ac.id/?menu=BrowseKuliah&submenu=detail&ID_KUR=".CHtml::encode($data->kodemk->ID_KUR)."&KODE_MK=".CHtml::encode($data->KODE_MK))',
        ),
        'RUANGAN',
        'AKTIFITAS',
        array(
            'header' => 'Pengajar',
            'value' => '$data->pic->NAMA'
        ),
        array(
            'header' => 'Aksi',
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'viewButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->ID.\'\'))',
            'updateButtonUrl' => 'Yii::app()->createUrl(\'djadwal/update\',array(\'id\'=>\'\'.$data->ID.\'\'))',
            'deleteButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->ID.\'\'))',
//            'buttons' => array(
//                'delete' => array(
//                    'click' => 'function(){return false;}'
//                )
//            )
        ),
    ),
));
?>

