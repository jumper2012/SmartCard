<?php
$this->breadcrumbs=array(
	'Pegawais',
);

$this->menu=array(
array('label'=>'Create Pegawai','url'=>array('create')),
array('label'=>'Manage Pegawai','url'=>array('admin')),
);
?>

<h1>Pegawais</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
