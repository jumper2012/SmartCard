<?php
$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	$model->ID_KUR,
);

$this->menu=array(
array('label'=>'List Kurikulum','url'=>array('index')),
array('label'=>'Create Kurikulum','url'=>array('create')),
array('label'=>'Update Kurikulum','url'=>array('update','id1'=>$model->ID_KUR,'id2'=>$model->KODE_MK)),
array('label'=>'Delete Kurikulum','url'=>'#','linkOptions'=>array('submit'=>array('delete','id1'=>$model->ID_KUR,id2=>$model->KODE_MK),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Kurikulum','url'=>array('admin')),
);
?>

<h1>View Kurikulum #<?php echo $model->ID_KUR; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_KUR',
		'KODE_MK',
		'NAMA_KUL_IND',
		'NAMA_KUL_ING',
		'SHORT_NAME',
		'KBK_ID',
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
),
)); ?>
