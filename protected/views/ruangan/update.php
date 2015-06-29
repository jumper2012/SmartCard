<?php
$this->breadcrumbs=array(
	'Ruangans'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Ruangan','url'=>array('index')),
	array('label'=>'Create Ruangan','url'=>array('create')),
	array('label'=>'View Ruangan','url'=>array('view','id'=>$model->ID)),
	array('label'=>'Manage Ruangan','url'=>array('admin')),
	);
	?>

	<h1>Update Ruangan <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>