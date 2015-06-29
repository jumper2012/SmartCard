<?php
	$this->menu=array(
	array('label'=>'List BeritaAcaraDaftarHadir','url'=>array('index')),
	array('label'=>'Create BeritaAcaraDaftarHadir','url'=>array('create')),
	array('label'=>'View BeritaAcaraDaftarHadir','url'=>array('view','id'=>$model->ID)),
	array('label'=>'Manage BeritaAcaraDaftarHadir','url'=>array('admin')),
	);
	?>

	<h1>Update BeritaAcaraDaftarHadir <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>