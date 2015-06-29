
<h1>Jadwal</h1>
<?php
// $this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 
?>
<?php
//$this->widget('booster.widgets.TbGroupGridView', array(
//    'filter' => $model,
//    'type' => 'striped bordered',
//    'dataProvider' => $model->search(),
//    'template' => "{items}",
//    'columns' => array('KELAS'),
//    'mergeColumns' => array('KELAS')
//));
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'view-jadwal-grid',
    'type' => 'striped bordered condensed',
    'emptyText' => 'Data tidak ditemukan',
    'summaryText' => 'Daftar Jadwal {start} - {end} dari {count}',
    'dataProvider' => $model->search(),
    'afterAjaxUpdate' => 'reinstallDatePicker1', // (#1)
    'template' => "{items}",
    'filter' => $model,
    'columns' => array(
        'WEEK',
        'TANGGAL',
        'SESSION',
        array(
            'header' => 'Kelas',
            'name' => 'KELAS',
            'value' => '$data->KELAS',
        ),
        'KODE_MK',
        array(
            'header' => 'Dosen',
            'name' => 'PIC',
            'value' => '$data->pic->NAMA'
        ),
        'AKTIFITAS',
        array(
            'header' => 'Aksi',
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>

<?php
//$this->widget('booster.widgets.TbGridView', array(
//    'id' => 'jadwal-grid',
//    'dataProvider' => 
//    'columns' => array(
//        'ID',
//        'WEEK',
//        'TANGGAL',
//        'SESSION',
//        'TA',
//        'ID_KUR',
//        /*
//          
//          'KELAS',
//          'RUANGAN',
//          'TOPIK',
//          'SUB_TOPIK',
//          'OBJEKTIF',
//          
//          'METODE',
//          'ALAT_BANTU',
//          'KET',
//          'LAST_UPDATE',
//          'USER_ID',
//          'WS',
//         */
//        array(
//            'class' => 'booster.widgets.TbButtonColumn',
//        ),
//    ),
//));
?>

<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#view-jadwal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('re-install-date-picker1', "
function reinstallDatePicker1(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_TANGGAL1').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['en'],{'dateFormat':'yy-mm-dd'}));
}
");
?>
