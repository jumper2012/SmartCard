<?php
$this->breadcrumbs=array(
	'Djadwals',
);

$this->menu=array(
array('label'=>'Create DJadwal','url'=>array('create')),
array('label'=>'Manage DJadwal','url'=>array('admin')),
);
?>

<h1>Djadwals</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
