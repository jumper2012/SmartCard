<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'ID', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'WEEK', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'SESSION', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'TA', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'ID_KUR', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'KODE_MK', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldGroup($model, 'KELAS', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->datepickerGroup($model, 'TANGGAL', array('options' => array(), 'htmlOptions' => array('class' => 'span5')), array('prepend' => '<i class="icon-calendar"></i>', 'append' => 'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

<?php echo $form->textFieldGroup($model, 'START_TIME', array('class' => 'span5')); ?>

<?php echo $form->textFieldGroup($model, 'END_TIME', array('class' => 'span5')); ?>

<?php echo $form->textAreaGroup($model, 'TOPIK', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldGroup($model, 'RUANGAN', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'AKTIFITAS', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php echo $form->textFieldGroup($model, 'PIC', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->dropDownListGroup($model, 'TIPE_KULIAH', array("Regular" => "Regular", "Pengganti" => "Pengganti",), array('class' => 'input-large')); ?>

<?php echo $form->textAreaGroup($model, 'METODE', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaGroup($model, 'ALAT_BANTU', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaGroup($model, 'CATATAN', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldGroup($model, 'LAST_UPDATE', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'USER_ID', array('class' => 'span5', 'maxlength' => 15)); ?>

    <?php echo $form->textFieldGroup($model, 'WS', array('class' => 'span5', 'maxlength' => 15)); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
