<?php
$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Kurikulum','url'=>array('index')),
array('label'=>'Create Kurikulum','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('kurikulum-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Kurikulums</h1>

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
'id'=>'kurikulum-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'ID_KUR',
		'KODE_MK',
		'NAMA_KUL_IND',
		'NAMA_KUL_ING',
		'SHORT_NAME',
		'KBK_ID',
		/*
		'COURSE_GROUP',
		'SKS',
		'SEM',
		'URUT_DLM_SEM',
		'SIFAT',
		'KEY_TOPICS_IND',
		'KEY_TOPICS_ING',
		'OBJEKTIF_IND',
		'OBJEKTIF_ING',
		'LAB_HOUR',
		'TUTORIAL_HOUR',
		'COURSE_HOUR',
		'COURSE_HOUR_IN_WEEK',
		'LAB_HOUR_IN_WEEK',
		'NUMBER_WEEK',
		'OTHER_ACTIVITY',
		'OTHER_ACTIVITY_HOUR',
		'KNOWLEDGE',
		'SKILL',
		'ATTITUDE',
		'UTS',
		'UAS',
		'TUGAS',
		'QUIZ',
		'WHITEBOARD',
		'LCD',
		'COURSEWARE',
		'LAB',
		'ELEARNING',
		'STATUS',
		'LAST_UPDATE',
		'USER_ID',
		'WS',
		'PREREQUISITES',
		'COURSE_DESCRIPTION',
		'COURSE_OBJECTIVES',
		'LEARNING_OUTCOMES',
		'COURSE_FORMAT',
		'GRADING_PROCEDURE',
		'COURSE_CONTENT',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>