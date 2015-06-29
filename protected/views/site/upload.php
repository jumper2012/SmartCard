

<div class="page-header">
    <h1>Upload Jadwal Perkuliahan<small> &nbsp;&nbsp;&nbsp;<?php echo "Untuk 1 Minggu" ?></small></h1>
</div>

<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect', '$("#test").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>

<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success" id="test">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?><?php ?>

<div class="well">
    <center>
        <?php
        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
            'id' => 'mjadwal-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
// ...
//echo $form->labelEx($model, 'excelfile');
//echo $form->fileField($model, 'excelfile');
//echo $form->error($model, 'excelfile');
        echo $form->fileFieldGroup($model, 'excelfile', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                )
        );
// ...

        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => 'Submit',
        ));

        $this->endWidget();
        ?>
    </center>
</div>