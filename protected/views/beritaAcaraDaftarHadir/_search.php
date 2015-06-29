<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'ID',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'WEEK',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'SESSION',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'START_TIME',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'END_TIME',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'TA',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'SEM',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'ID_KUR',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'KODE_MK',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'NIM',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldGroup($model,'STATUS',array('class'=>'span5','maxlength'=>7)); ?>

		<?php echo $form->textAreaGroup($model,'KETERANGAN',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'LAST_UPDATE',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldGroup($model,'USER_ID',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'WS',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'WAKTU_ABSEN',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
