<?php
$this->breadcrumbs=array(
	'Dims'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Dim','url'=>array('index')),
array('label'=>'Manage Dim','url'=>array('admin')),
);
?>

<h1>Create Dim</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>