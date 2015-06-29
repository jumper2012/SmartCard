<?php
$this->menu=array(
array('label'=>'List BeritaAcaraDaftarHadir','url'=>array('index')),
array('label'=>'Manage BeritaAcaraDaftarHadir','url'=>array('admin')),
);
?>

<h1>Create BeritaAcaraDaftarHadir</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>