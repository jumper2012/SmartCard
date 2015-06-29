<?php

$this->menu=array(
array('label'=>'List BeritaAcaraDaftarHadir','url'=>array('index')),
array('label'=>'Create BeritaAcaraDaftarHadir','url'=>array('create')),
array('label'=>'Update BeritaAcaraDaftarHadir','url'=>array('update','id'=>$model->ID)),
array('label'=>'Delete BeritaAcaraDaftarHadir','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage BeritaAcaraDaftarHadir','url'=>array('admin')),
);
?>

<h1>View BeritaAcaraDaftarHadir #<?php echo $model->ID; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID',
		'WEEK',
		'SESSION',
		'START_TIME',
		'END_TIME',
		'TA',
		'SEM',
		'ID_KUR',
		'KODE_MK',
		'NIM',
		'STATUS',
		'KETERANGAN',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
		'WAKTU_ABSEN',
),
)); ?>
