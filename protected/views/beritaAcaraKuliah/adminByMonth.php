<?php


$this->menu=array(
array('label'=>'List BeritaAcaraKuliah','url'=>array('index')),
array('label'=>'Manage BeritaAcaraKuliah','url'=>array('admin')),
);
?>

<h1>Find your Berita Acara Kuliah</h1>

<?php echo $this->renderPartial('_formAcaraKuliah', array('model'=>$model)); ?>