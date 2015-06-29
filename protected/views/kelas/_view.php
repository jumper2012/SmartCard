<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('KELAS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->KELAS),array('view','id'=>$data->KELAS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KET')); ?>:</b>
	<?php echo CHtml::encode($data->KET); ?>
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


</div>