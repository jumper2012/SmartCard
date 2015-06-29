<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'KELAS',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textAreaRow($model,'KET',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'LAST_UPDATE',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'USER_ID',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'WS',array('class'=>'span5','maxlength'=>15)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
