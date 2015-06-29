<?php

$this->menu=array(
array('label'=>'Create BeritaAcaraKuliah','url'=>array('create')),
array('label'=>'Manage BeritaAcaraKuliah','url'=>array('admin')),
);
?>

<h1>Berita Acara Kuliahs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
