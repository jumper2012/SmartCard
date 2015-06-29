<div class="page-header">
    <h1>Upload Data Kehadiran<small> &nbsp;&nbsp;&nbsp;<?php echo "Yg didapatkan dari RFID" ?></small></h1>
</div>

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