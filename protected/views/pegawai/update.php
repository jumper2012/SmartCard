<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Pegawai','url'=>array('index')),
	array('label'=>'Create Pegawai','url'=>array('create')),
	array('label'=>'View Pegawai','url'=>array('view','id'=>$model->ID)),
	array('label'=>'Manage Pegawai','url'=>array('admin')),
	);
	?>

	<h1>Update Pegawai <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>