<?php
$this->breadcrumbs=array(
	'Kelases'=>array('index'),
	$model->KELAS,
);

$this->menu=array(
array('label'=>'List Kelas','url'=>array('index')),
array('label'=>'Create Kelas','url'=>array('create')),
array('label'=>'Update Kelas','url'=>array('update','id'=>$model->KELAS)),
array('label'=>'Delete Kelas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->KELAS),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Kelas','url'=>array('admin')),
);
?>

<h1>View Kelas #<?php echo $model->KELAS; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'KELAS',
		'KET',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
),
)); ?>
