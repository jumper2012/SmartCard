<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'berita-acara-kuliah-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php
echo $form->dropDownListGroup(
        $model, 'TIPE_KULIAH', array('wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => array(
            "1" => 'Regular', "2" => 'Pengganti',
        ),
        'htmlOptions' => array(),
    )
        )
);
?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
