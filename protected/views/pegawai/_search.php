<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'ID', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'NIP', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'KPT_NO', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldGroup($model, 'USER_NAME', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'NAMA', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'POSISI', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'ALIAS', array('class' => 'span5', 'maxlength' => 5)); ?>

<?php echo $form->datepickerGroup($model, 'TGL_LAHIR', array('options' => array(), 'htmlOptions' => array('class' => 'span5')), array('prepend' => '<i class="icon-calendar"></i>', 'append' => 'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

<?php echo $form->textFieldGroup($model, 'TEMPAT_LAHIR', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'JENIS_KELAMIN', array('class' => 'span5', 'maxlength' => 1)); ?>

<?php echo $form->textFieldGroup($model, 'GOL_DARAH', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->datepickerGroup($model, 'TGL_MASUK', array('options' => array(), 'htmlOptions' => array('class' => 'span5')), array('prepend' => '<i class="icon-calendar"></i>', 'append' => 'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

<?php echo $form->datepickerGroup($model, 'TGL_KELUAR', array('options' => array(), 'htmlOptions' => array('class' => 'span5')), array('prepend' => '<i class="icon-calendar"></i>', 'append' => 'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

<?php echo $form->textFieldGroup($model, 'AGAMA', array('class' => 'span5', 'maxlength' => 30)); ?>

<?php echo $form->textFieldGroup($model, 'KBK_ID', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'EXT_NUM', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldGroup($model, 'HP', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'EMAIL', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'ALAMAT_LIBUR', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'KOTA', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'KODE_POS', array('class' => 'span5', 'maxlength' => 5)); ?>

<?php echo $form->textFieldGroup($model, 'TELEPON', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php echo $form->textFieldGroup($model, 'KTP', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'PENDIDIKAN', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldGroup($model, 'JABATAN', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'PENDIDIKAN_TERTINGGI', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'STUDY_AREA1', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'STUDY_AREA2', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'STATUS', array('class' => 'span5', 'maxlength' => 1)); ?>

<?php echo $form->textFieldGroup($model, 'NAMA_BAPAK', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'NAMA_IBU', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'PEKERJAAN_ORTU', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldGroup($model, 'NAMA_P', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'TMP_LAHIR_P', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->datepickerGroup($model, 'TGL_LAHIR_P', array('options' => array(), 'htmlOptions' => array('class' => 'span5')), array('prepend' => '<i class="icon-calendar"></i>', 'append' => 'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

<?php echo $form->textAreaGroup($model, 'KET', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldGroup($model, 'STATUS_AKHIR', array('class' => 'span5', 'maxlength' => 5)); ?>

<?php echo $form->textFieldGroup($model, 'LAST_UPDATE', array('class' => 'span5', 'maxlength' => 14)); ?>

<?php echo $form->textFieldGroup($model, 'USER_ID', array('class' => 'span5', 'maxlength' => 50)); ?>

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
