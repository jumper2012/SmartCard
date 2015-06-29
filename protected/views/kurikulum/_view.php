<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_KUR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_KUR),array('view','id1'=>$data->ID_KUR,'id2'=>$data->KODE_MK)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KODE_MK')); ?>:</b>
	<?php echo CHtml::encode($data->KODE_MK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_KUL_IND')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_KUL_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_KUL_ING')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_KUL_ING); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SHORT_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->SHORT_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KBK_ID')); ?>:</b>
	<?php echo CHtml::encode($data->KBK_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_GROUP')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_GROUP); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SKS')); ?>:</b>
	<?php echo CHtml::encode($data->SKS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEM')); ?>:</b>
	<?php echo CHtml::encode($data->SEM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('URUT_DLM_SEM')); ?>:</b>
	<?php echo CHtml::encode($data->URUT_DLM_SEM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SIFAT')); ?>:</b>
	<?php echo CHtml::encode($data->SIFAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KEY_TOPICS_IND')); ?>:</b>
	<?php echo CHtml::encode($data->KEY_TOPICS_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KEY_TOPICS_ING')); ?>:</b>
	<?php echo CHtml::encode($data->KEY_TOPICS_ING); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBJEKTIF_IND')); ?>:</b>
	<?php echo CHtml::encode($data->OBJEKTIF_IND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBJEKTIF_ING')); ?>:</b>
	<?php echo CHtml::encode($data->OBJEKTIF_ING); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAB_HOUR')); ?>:</b>
	<?php echo CHtml::encode($data->LAB_HOUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TUTORIAL_HOUR')); ?>:</b>
	<?php echo CHtml::encode($data->TUTORIAL_HOUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_HOUR')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_HOUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_HOUR_IN_WEEK')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_HOUR_IN_WEEK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAB_HOUR_IN_WEEK')); ?>:</b>
	<?php echo CHtml::encode($data->LAB_HOUR_IN_WEEK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMBER_WEEK')); ?>:</b>
	<?php echo CHtml::encode($data->NUMBER_WEEK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OTHER_ACTIVITY')); ?>:</b>
	<?php echo CHtml::encode($data->OTHER_ACTIVITY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OTHER_ACTIVITY_HOUR')); ?>:</b>
	<?php echo CHtml::encode($data->OTHER_ACTIVITY_HOUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KNOWLEDGE')); ?>:</b>
	<?php echo CHtml::encode($data->KNOWLEDGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SKILL')); ?>:</b>
	<?php echo CHtml::encode($data->SKILL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATTITUDE')); ?>:</b>
	<?php echo CHtml::encode($data->ATTITUDE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UTS')); ?>:</b>
	<?php echo CHtml::encode($data->UTS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UAS')); ?>:</b>
	<?php echo CHtml::encode($data->UAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TUGAS')); ?>:</b>
	<?php echo CHtml::encode($data->TUGAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QUIZ')); ?>:</b>
	<?php echo CHtml::encode($data->QUIZ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WHITEBOARD')); ?>:</b>
	<?php echo CHtml::encode($data->WHITEBOARD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LCD')); ?>:</b>
	<?php echo CHtml::encode($data->LCD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSEWARE')); ?>:</b>
	<?php echo CHtml::encode($data->COURSEWARE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAB')); ?>:</b>
	<?php echo CHtml::encode($data->LAB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ELEARNING')); ?>:</b>
	<?php echo CHtml::encode($data->ELEARNING); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WS')); ?>:</b>
	<?php echo CHtml::encode($data->WS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PREREQUISITES')); ?>:</b>
	<?php echo CHtml::encode($data->PREREQUISITES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_OBJECTIVES')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_OBJECTIVES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEARNING_OUTCOMES')); ?>:</b>
	<?php echo CHtml::encode($data->LEARNING_OUTCOMES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_FORMAT')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_FORMAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRADING_PROCEDURE')); ?>:</b>
	<?php echo CHtml::encode($data->GRADING_PROCEDURE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_CONTENT')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_CONTENT); ?>
	<br />

	*/ ?>

</div>