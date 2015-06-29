<?php
$this->breadcrumbs=array(
	'Ruangans'=>array('index'),
	$model->NAME,
);

$this->menu=array(
array('label'=>'List Ruangan','url'=>array('index')),
array('label'=>'Create Ruangan','url'=>array('create')),
array('label'=>'Update Ruangan','url'=>array('update','id'=>$model->ID)),
array('label'=>'Delete Ruangan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Ruangan','url'=>array('admin')),
);
?>

<h1>View Ruangan #<?php echo $model->ID; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID',
		'SHORT_NAME',
		'NAME',
		'KAPASITAS',
		'KET',
		'STATUS',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
		'RFID',
),
)); ?>
