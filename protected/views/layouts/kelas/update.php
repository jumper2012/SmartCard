<?php
$this->breadcrumbs=array(
	'Kelases'=>array('index'),
	$model->KELAS=>array('view','id'=>$model->KELAS),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Kelas','url'=>array('index')),
	array('label'=>'Create Kelas','url'=>array('create')),
	array('label'=>'View Kelas','url'=>array('view','id'=>$model->KELAS)),
	array('label'=>'Manage Kelas','url'=>array('admin')),
	);
	?>

	<h1>Update Kelas <?php echo $model->KELAS; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>