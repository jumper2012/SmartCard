<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id'=>'MJadwal',
    'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->textFieldGroup($model,'TANGGAL',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context'=>'primary',
        'label'=>'Search',
    )); ?>
</div>

<?php $this->endWidget(); ?>
