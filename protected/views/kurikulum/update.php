<?php
$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	$model->ID_KUR=>array('view','id'=>$model->ID_KUR),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Kurikulum','url'=>array('index')),
	array('label'=>'Create Kurikulum','url'=>array('create')),
	array('label'=>'View Kurikulum','url'=>array('view','id'=>$model->ID_KUR)),
	array('label'=>'Manage Kurikulum','url'=>array('admin')),
	);
	?>

	<h1>Update Kurikulum <?php echo $model->ID_KUR; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>