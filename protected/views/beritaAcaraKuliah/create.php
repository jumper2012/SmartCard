<?php

$this->menu=array(
array('label'=>'List BeritaAcaraKuliah','url'=>array('index')),
array('label'=>'Manage BeritaAcaraKuliah','url'=>array('admin')),
);
?>

<h1>Create BeritaAcaraKuliah</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>