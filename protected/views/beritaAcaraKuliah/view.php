<?php
$this->menu = array(
    array('label' => 'List BeritaAcaraKuliah', 'url' => array('index')),
    array('label' => 'Create BeritaAcaraKuliah', 'url' => array('create')),
    array('label' => 'Update BeritaAcaraKuliah', 'url' => array('update', 'id' => $model->ID)),
    array('label' => 'Delete BeritaAcaraKuliah', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ID), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage BeritaAcaraKuliah', 'url' => array('admin')),
);
?>

<h1>View BeritaAcaraKuliah #<?php echo $model->ID; ?></h1>
<BR>
<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'header' => 'Minggu',
            'name' => 'Minggu',
            'value' => $model->iddetailjadwal->idjadwal->WEEK,
        ),
        array(
            'header' => 'Sesi',
            'name' => 'Sesi',
            'value' => $model->iddetailjadwal->SESSION,
        ),
        array(
            'header' => 'Mata Kuliah',
            'name' => 'Mata Kuliah',
            'value' => $model->iddetailjadwal->kodemk->SHORT_NAME,
        ),
        array(
            'header' => 'Kelas',
            'name' => 'Kelas',
            'value' => $model->iddetailjadwal->idjadwal->KELAS,
        ),
        array(
            'header' => 'Tanggal',
            'name' => 'Tanggal',
            'value' => $model->iddetailjadwal->idjadwal->TANGGAL,
        ),
        array(
            'header' => 'Ruangan',
            'name' => 'Ruangan',
            'value' => $model->iddetailjadwal->RUANGAN,
        ),
        array(
            'header' => 'Aktifitas',
            'name' => 'Aktifitas',
            'value' => $model->iddetailjadwal->AKTIFITAS,
        ),
        array(
            'header' => 'Pengajar',
            'name' => 'Pengajar',
            'value' => $model->iddetailjadwal->pic->NAMA,
        ),
//        'METODE',
//        'ALAT_BANTU',
//        'CATATAN',
//        'LAST_UPDATE',
//        'USER_ID',
//        'WS',
    ),
));
?>
