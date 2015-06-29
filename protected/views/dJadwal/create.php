<?php
$this->breadcrumbs = array(
    'Djadwals' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List DJadwal', 'url' => array('index')),
    array('label' => 'Manage DJadwal', 'url' => array('admin')),
);
?>

<h1>Create DJadwal</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>