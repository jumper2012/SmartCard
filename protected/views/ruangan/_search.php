<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'ID', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'SHORT_NAME', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'NAME', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->textFieldGroup($model, 'KAPASITAS', array('class' => 'span5')); ?>

<?php echo $form->textAreaGroup($model, 'KET', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldGroup($model, 'STATUS', array('class' => 'span5', 'maxlength' => 1)); ?>

<?php echo $form->textFieldGroup($model, 'LAST_UPDATE', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldGroup($model, 'USER_ID', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldGroup($model, 'WS', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php echo $form->textFieldGroup($model, 'RFID', array('class' => 'span5', 'maxlength' => 20)); ?>

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
