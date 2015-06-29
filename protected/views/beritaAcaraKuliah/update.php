<?php
$this->menu = array(
    array('label' => 'List BeritaAcaraKuliah', 'url' => array('index')),
    array('label' => 'Create BeritaAcaraKuliah', 'url' => array('create')),
    array('label' => 'View BeritaAcaraKuliah', 'url' => array('view', 'id' => $model->ID)),
    array('label' => 'Manage BeritaAcaraKuliah', 'url' => array('admin')),
);
?>

<h1>Update BeritaAcaraKuliah <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>