<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SHORT_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->SHORT_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KAPASITAS')); ?>:</b>
	<?php echo CHtml::encode($data->KAPASITAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KET')); ?>:</b>
	<?php echo CHtml::encode($data->KET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WS')); ?>:</b>
	<?php echo CHtml::encode($data->WS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RFID')); ?>:</b>
	<?php echo CHtml::encode($data->RFID); ?>
	<br />

	*/ ?>

</div>