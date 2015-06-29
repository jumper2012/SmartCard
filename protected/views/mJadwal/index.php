<div class="page-header">
    <h1>Daftar Jadwal<small> &nbsp;&nbsp;&nbsp;<?php echo "" ?></small></h1>
</div>

<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect', '$("#test").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>

<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success" id="test">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?><?php ?>

<?php
// Script
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('mjadwal-grid', {
data: $(this).serialize()
});
return false;
});
");

Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_TANGGAL').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['en'],{'dateFormat':'yy-mm-dd'}));
}
");
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'mjadwal-grid',
    'dataProvider' => $model->search(),
    'emptyText' => 'Data tidak ditemukan',
    'summaryText' => 'Daftar Jadwal {start} - {end} dari {count}',
    'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'Minggu',
            'name' => 'WEEK',
            'value' => '$data->WEEK',
            'htmlOptions' => array(
                'width' => '20', // menentukan ukuran column
            ),
        ),
        array(
            'header' => 'Tanggal',
            'name' => 'TANGGAL',
            'htmlOptions' => array(
                'width' => '100', // menentukan ukuran column
            ),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'TANGGAL',
                'language' => 'en',
                'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
                'defaultOptions' => array(
                    'showOn' => 'focus',
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                ),
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                    'id' => 'datepicker_for_TANGGAL',
                ),
                    ), true),
        ),
        array(
            'header' => 'Kelas',
            'name' => 'KELAS',
            'htmlOptions' => array(
                'width' => '100', // menentukan ukuran column
            ),
            'value' => '$data->KELAS',
        ),
        array(
            'header' => 'Tahun Ajaran',
            'name' => 'TA',
            'htmlOptions' => array(
                'width' => '100', // menentukan ukuran column
            ),
            'value' => '$data->TA',
        ),
        array(
            'header' => 'Kurikulum',
            'name' => 'ID_KUR',
            'htmlOptions' => array(
                'width' => '100', // menentukan ukuran column
            ),
            'value' => '$data->ID_KUR',
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
<?php
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'jadwal-grid',
//    'dataProvider' => $dataProvider->search(),
//    'emptyText' => 'Data tidak ditemukan',
//    'summaryText' => 'Daftar Jadwal {start} - {end} dari {count}',
//    'emptyText' => 'Data tidak ditemukan',
//    'filter' => $dataProvider,
//    'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
//    'columns' => array(
//        array(
//            'header' => 'Minggu',
//            'name' => 'WEEK',
////            'filter' => CHtml::listData(DaftarPelanggaran::model()->findAll(), 'ID', 'DESKRIPSI'),
//            'value' => '$data->WEEK',
//        ),
//        array(
//            'header' => 'Tanggal',
//            'name' => 'TANGGAL',
////            'filter' => CHtml::listData(DaftarPelanggaran::model()->findAll(), 'ID', 'DESKRIPSI'),
//            'value' => '$data->TANGGAL',
//        ),
//        array(
//            'header' => 'Kelas',
//            'name' => 'KELAS',
////            'filter' => CHtml::listData(DaftarPelanggaran::model()->findAll(), 'ID', 'DESKRIPSI'),
//            'value' => '$data->KELAS',
//        ),
//        array(
//            'header' => 'Tahun Ajaran',
//            'name' => 'TA',
////            'filter' => CHtml::listData(DaftarPelanggaran::model()->findAll(), 'ID', 'DESKRIPSI'),
//            'value' => '$data->TA',
//        ),
//        array(
//            'header' => 'Kurikulum',
//            'name' => 'ID_KUR',
////            'filter' => CHtml::listData(DaftarPelanggaran::model()->findAll(), 'ID', 'DESKRIPSI'),
//            'value' => '$data->ID_KUR',
//        ),
////        array(
////            'header' => 'Pelapor',
////            'name' => 'PENGGUNA',
////            'filter' => CHtml::listData(Pengguna::model()->findAll(), 'USERNAME', 'NAMA'),
////            'value' => '$data->pengguna->NAMA',
////        ),
////        array(
////            'header' => 'Mahasiswa',
////            'name' => 'MAHASISWA',
////            'filter' => CHtml::listData(Mahasiswa::model()->findAll(), 'USERNAME', 'NIM'),
////            'value' => '$data->mahasiswa->NIM',
////        ),
////        array(
////            'header' => 'Tanggal Kejadian',
////            'name' => 'TANGGAL',
////            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
////                'model' => $model,
////                'attribute' => 'TANGGAL',
////                'language' => 'en',
////                'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
////                'defaultOptions' => array(
////                    'showOn' => 'focus',
////                    'dateFormat' => 'yy-mm-dd',
////                    'showOtherMonths' => true,
////                    'selectOtherMonths' => true,
////                    'changeMonth' => true,
////                    'changeYear' => true,
////                ),
////                'htmlOptions' => array(
////                    'size' => '10', // textField size
////                    'maxlength' => '10', // textField maxlength
////                    'id' => 'datepicker_for_TANGGAL',
////                ),
////                    ), true),
////        //'value' => '$data->TANGGAL',
////        ),
////        array(
////            'header' => 'Aksi',
////            'class' => 'CButtonColumn',
////            'template' => '{view}{addsanksi}',
////            'buttons' => array(
////                'addsanksi' => array(
////                    'label' => 'Beri Sanksi',
////                    'imageUrl' => Yii::app()->theme->baseUrl . '/img/ico/addSanksi.png',
////                    'url' => 'Yii::app()->createUrl(\'sanksi/addsanksi\',array(\'id\'=>\'\'.$data->ID.\'\'))',
////                ),
////            ),
////        ),
//    ),
//));
?>
