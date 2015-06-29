<?php
$this->breadcrumbs = array(
    'Pegawais' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Pegawai', 'url' => array('index')),
    array('label' => 'Create Pegawai', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('pegawai-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Pegawais</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'pegawai-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'ID',
        'NIP',
        'KPT_NO',
        'USER_NAME',
        'NAMA',
        'POSISI',
        /*
          'ALIAS',
          'TGL_LAHIR',
          'TEMPAT_LAHIR',
          'JENIS_KELAMIN',
          'GOL_DARAH',
          'TGL_MASUK',
          'TGL_KELUAR',
          'AGAMA',
          'KBK_ID',
          'EXT_NUM',
          'HP',
          'EMAIL',
          'ALAMAT_LIBUR',
          'KOTA',
          'KODE_POS',
          'TELEPON',
          'KTP',
          'PENDIDIKAN',
          'JABATAN',
          'PENDIDIKAN_TERTINGGI',
          'STUDY_AREA1',
          'STUDY_AREA2',
          'STATUS',
          'NAMA_BAPAK',
          'NAMA_IBU',
          'PEKERJAAN_ORTU',
          'NAMA_P',
          'TMP_LAHIR_P',
          'TGL_LAHIR_P',
          'KET',
          'STATUS_AKHIR',
          'LAST_UPDATE',
          'USER_ID',
          'WS',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
