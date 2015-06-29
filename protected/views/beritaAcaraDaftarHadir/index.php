<?php


$this->menu=array(
array('label'=>'Create BeritaAcaraDaftarHadir','url'=>array('create')),
array('label'=>'Manage BeritaAcaraDaftarHadir','url'=>array('admin')),
);
?>

<h1>Berita Acara Daftar Hadirs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
