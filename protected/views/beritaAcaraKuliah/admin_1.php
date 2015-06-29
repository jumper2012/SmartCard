<?php
$this->menu = array(
    array('label' => 'List BeritaAcaraDaftarHadir', 'url' => array('index')),
    array('label' => 'Create BeritaAcaraDaftarHadir', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('berita-acara-daftar-hadir-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Berita Acara Daftar Hadirs</h1>

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
    'id' => 'berita-acara-daftar-hadir-grid',
    'dataProvider' => $dataProvider,
//'filter'=>$model,
    'columns' => array(
        'ID',
        'WEEK',
        'SESSION',
        'START_TIME',
        'END_TIME',
        'TA',
        'SEM',
        'ID_KUR',
        'KODE_MK',
        'NIM',
        'STATUS',
        'KETERANGAN',
        'LAST_UPDATE',
        'USER_ID',
        'WS',
        'WAKTU_ABSEN',
        //*/
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
