<?php
$this->breadcrumbs=array(
	'Dims'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Dim','url'=>array('index')),
array('label'=>'Create Dim','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('dim-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Dims</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'dim-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'NIM',
		'NO_USM',
		'JALUR',
		'USER_NAME',
		'KBK_ID',
		'KPT_PRODI',
		/*
		'ID_KUR',
		'NAMA',
		'TGL_LAHIR',
		'TEMPAT_LAHIR',
		'GOL_DARAH',
		'JENIS_KELAMIN',
		'AGAMA',
		'ALAMAT',
		'KABUPATEN',
		'KODE_POS',
		'EMAIL',
		'TELEPON',
		'HP',
		'HP2',
		'NAMA_SMA',
		'NO_IJAZAH_SMA',
		'ALAMAT_SMA',
		'KABUPATEN_SMA',
		'KODEPOS_SMA',
		'TELEPON_SMA',
		'THN_MASUK',
		'STATUS_AKHIR',
		'NAMA_AYAH',
		'NAMA_IBU',
		'NO_HP_AYAH',
		'NO_HP_IBU',
		'ALAMAT_ORANGTUA',
		'PEKERJAAN_AYAH',
		'KETERANGAN_PEKERJAAN_AYAH',
		'PENGHASILAN_AYAH',
		'PEKERJAAN_IBU',
		'KETERANGAN_PEKERJAAN_IBU',
		'PENGHASILAN_IBU',
		'NAMA_WALI',
		'PEKERJAAN_WALI',
		'KETERANGAN_PEKERJAAN_WALI',
		'PENGHASILAN_WALI',
		'ALAMAT_WALI',
		'TELEPON_WALI',
		'NO_HP_WALI',
		'PENDAPATAN',
		'IPK',
		'ANAK_KE',
		'DARI_JLH_ANAK',
		'JUMLAH_TANGGUNGAN',
		'NILAI_USM',
		'SCORE_IQ',
		'REKOMENDASI_PSIKOTEST',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
