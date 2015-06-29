<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'mjadwal-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'SESSION', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'KODE_MK', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8)))); ?>

<?php
$data = CHtml::listData(Ruangan ::model()->findAll(), 'ID', 'SHORT_NAME');
echo $form->dropDownListGroup($model, 'RUANGAN', array('widgetOptions' => array('data' => $data,'htmlOptions' => array('class' => 'input-large'),
    )
        )
);
?>
<?php // echo $form->textFieldGroup($model, 'RUANGAN', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>

<?php // echo $form->textFieldGroup($model, 'TOPIK', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php // echo $form->textAreaGroup($model, 'SUB_TOPIK', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?php // echo $form->textAreaGroup($model, 'OBJEKTIF', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?php echo $form->dropDownListGroup($model, 'AKTIFITAS', array('widgetOptions' => array('data' => array("Teori" => "Teori", "Praktikum" => "Praktikum", "Mandiri" => "Mandiri",), 'htmlOptions' => array('class' => 'input-large')))); ?>

<!--        <div class="form-actions">
<?php
//            $this->widget('booster.widgets.TbButton', array(
//                'buttonType' => 'submit',
//                'context' => 'primary',
//                'label' => $model->isNewRecord ? 'Create' : 'Save',
//            ));
?>
        </div>-->

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Buat Baru' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>