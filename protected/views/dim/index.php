<?php
$this->breadcrumbs=array(
	'Dims',
);

$this->menu=array(
array('label'=>'Create Dim','url'=>array('create')),
array('label'=>'Manage Dim','url'=>array('admin')),
);
?>

<h1>Dims</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
