<?php
$this->breadcrumbs=array(
	'Dims'=>array('index'),
	$model->NIM=>array('view','id'=>$model->NIM),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Dim','url'=>array('index')),
	array('label'=>'Create Dim','url'=>array('create')),
	array('label'=>'View Dim','url'=>array('view','id'=>$model->NIM)),
	array('label'=>'Manage Dim','url'=>array('admin')),
	);
	?>

	<h1>Update Dim <?php echo $model->NIM; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>