<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->ID,
);

$this->menu=array(
array('label'=>'List Account','url'=>array('index')),
array('label'=>'Create Account','url'=>array('create')),
array('label'=>'Update Account','url'=>array('update','id'=>$model->ID)),
array('label'=>'Delete Account','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Account','url'=>array('admin')),
);
?>

<h1>View Account #<?php echo $model->ID; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID',
		'ACCOUNT',
		'PASSWORD',
),
)); ?>
