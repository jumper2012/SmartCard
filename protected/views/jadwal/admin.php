<?php
$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Jadwal','url'=>array('index')),
array('label'=>'Create Jadwal','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('jadwal-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Jadwals</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'jadwal-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'ID',
		'WEEK',
		'TANGGAL',
		'SESSION',
		'TA',
		'ID_KUR',
		/*
		'KODE_MK',
		'KELAS',
		'RUANGAN',
		'TOPIK',
		'SUB_TOPIK',
		'OBJEKTIF',
		'AKTIFITAS',
		'PIC',
		'METODE',
		'ALAT_BANTU',
		'KET',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
