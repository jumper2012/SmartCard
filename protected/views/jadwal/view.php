<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?><?php ?>

<?php
$this->beginWidget(
        'booster.widgets.TbJumbotron', array(
    'heading' => 'Lihat Jadwal',
        )
);
?>
<?php $this->endWidget(); ?>
<BR>
<BR>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'WEEK',
        'TANGGAL',
        array('name' => 'Sesi', 'value' => $model->SESSION),
        array(
            'header' => 'TA',
            'name' => 'Tahun Ajaran',
            'value' => $model->TA
        ),
        array(
            'header' => 'KODE_MK',
            'name' => 'Mata Kuliah',
            'value' => $model->KODE_MK . " - " . $model->kodemk->NAMA_KUL_IND,
        ),
        'KELAS',
        'RUANGAN',
        'AKTIFITAS',
        array(
            'header' => 'PIC',
            'name' => 'Pengajar',
            'value' => $model->pic->NAMA,
        ),
    ),
));
?>

<BR><BR>
<?php
$this->beginWidget(
        'booster.widgets.TbJumbotron', array(
    'heading' => 'Mahasiswa Yang Mengikuti',
        )
);
?>
<?php $this->endWidget(); ?>
<BR>
<BR>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'berita-acara-daftar-hadir-grid',
    'dataProvider' => $daftarhadir->searchCondition($model->WEEK, $model->TANGGAL, $model->SESSION, $model->ID_KUR, $model->KODE_MK),
    'filter' => $daftarhadir,
    'columns' => array(
        'NIM',
        array(
            'header' => 'Nama',
            'name' => 'nim',
            'value' => '$data->nim->NAMA',
        ),
        'STATUS',
        'WAKTU_ABSEN',
    ),
));
?>
