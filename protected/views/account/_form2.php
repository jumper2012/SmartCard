<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Account-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php //echo $form->labelEx($model,'ACCOUNT'); ?>
                <?php //echo $model->ACCOUNT?>
		<?php echo $form->hiddenField($model,'ACCOUNT',array('size'=>30,'maxlength'=>30)); ?><br>
		<?php echo $form->error($model,'ACCOUNT'); ?>
	</div>
        
        <div class="row">
		<?php echo Chtml::label('Current Password','oldpw') ?>
                <?php //echo Chtml::textField("aoldpw",'',array('size'=>60,'maxlength'=>64)); ?>
                <?php echo Chtml::passwordField("oldpw",'',array('size'=>60,'maxlength'=>64)); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('New Password','password') ?>
		<?php echo CHtml::passwordField("password",'',array('size'=>60,'maxlength'=>64)); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Repeate New Password','repassword') ?>
		<?php echo CHtml::passwordField("repassword",'',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->