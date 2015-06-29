
<div style="margin-bottom: 20px; display: <?php echo!empty($display) ? $display : 'none'; ?>; width:100%; clear:left;" class="crow">
    <fieldset>
        <legend>Test</legend>
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

        <?php echo $form->textFieldGroup($model, 'RUANGAN', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>

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

        <?php $this->endWidget(); ?>
    </fieldset>
</div>



<?php
Yii::app()->clientScript->registerScript('deleteChild', "
function deleteChild(elm, index)
{
    element=$(elm).parent().parent();
    /* animate div */
    $(element).animate(
    {
        opacity: 0.25,
        left: '+=50',
        height: 'toggle'
    }, 500,
    function() {
        /* remove div */
        $(element).remove();
    });
}", CClientScript::POS_END);
?>