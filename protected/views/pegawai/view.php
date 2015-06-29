<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	$model->ID,
);

$this->menu=array(
array('label'=>'List Pegawai','url'=>array('index')),
array('label'=>'Create Pegawai','url'=>array('create')),
array('label'=>'Update Pegawai','url'=>array('update','id'=>$model->ID)),
array('label'=>'Delete Pegawai','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Pegawai','url'=>array('admin')),
);
?>

<h1>View Pegawai #<?php echo $model->ID; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID',
		'NIP',
		'KPT_NO',
		'USER_NAME',
		'NAMA',
		'POSISI',
		'ALIAS',
		'TGL_LAHIR',
		'TEMPAT_LAHIR',
		'JENIS_KELAMIN',
		'GOL_DARAH',
		'TGL_MASUK',
		'TGL_KELUAR',
		'AGAMA',
		'KBK_ID',
		'EXT_NUM',
		'HP',
		'EMAIL',
		'ALAMAT_LIBUR',
		'KOTA',
		'KODE_POS',
		'TELEPON',
		'KTP',
		'PENDIDIKAN',
		'JABATAN',
		'PENDIDIKAN_TERTINGGI',
		'STUDY_AREA1',
		'STUDY_AREA2',
		'STATUS',
		'NAMA_BAPAK',
		'NAMA_IBU',
		'PEKERJAAN_ORTU',
		'NAMA_P',
		'TMP_LAHIR_P',
		'TGL_LAHIR_P',
		'KET',
		'STATUS_AKHIR',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
),
)); ?>
