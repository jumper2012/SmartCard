<?php
$sql_id_kur = "SELECT ID_KUR FROM kurikulum ORDER BY ID_KUR DESC LIMIT 1";
$last_id_kur = Yii::app()->db->createCommand($sql_id_kur)->queryAll();
$last = $last_id_kur[0]['ID_KUR'];

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'mjadwal-form',
    'enableAjaxValidation' => false,
        ));
?>


<?php
echo $form->dropDownListGroup(
        $model, 'WEEK', array('wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => array(
            'Pilih Minggu', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'
        ),
        'htmlOptions' => array(),
    )
        )
);
?>

<?php echo $form->datePickerGroup($model, 'TANGGAL', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Pilih Tanggal Jadwal.')); ?>

<?php
$ta = CHtml::listData(Registrasi::model()->findAll(
                        array('select' => 't.TA',
                            'order' => 'TA DESC',
                            'distinct' => true,)
                ), 'TA', 'TA');

echo $form->dropDownListGroup(
        $model, 'TA', array('wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => $ta,
        'htmlOptions' => array(
        )
    )
        )
)
?>

<?php
$idkur = CHtml::listData(Registrasi::model()->findAll(
                        array('select' => 't.KELAS',
                            'condition' => "TA = 2013",
                            'order' => 'KELAS DESC',
                            'distinct' => true,)
                ), 'KELAS', 'KELAS');

echo $form->dropDownListGroup(
        $model, 'KELAS', array('wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => $idkur,
        'htmlOptions' => array(),
    )
        )
);
?>

<?php
$idkur = CHtml::listData(Kurikulum::model()->findAll(
                        array('select' => 't.ID_KUR',
                            'order' => 'ID_KUR DESC',
                            'distinct' => true,)
                ), 'ID_KUR', 'ID_KUR');

echo $form->dropDownListGroup(
        $model, 'ID_KUR', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => $idkur,
        'htmlOptions' => array(
//            'ajax' => array(
//                'type' => 'POST',
//                'url' => CController::createUrl('MJadwal/matkul'),
//                'update' => '#' . CHtml::activeID($djadwal, 'KODE_MK'),
//            ),
        ),
    )
        )
);
?>

<!--<BR><BR>-->
<?php // for ($i = 0; $i < 8; $i++) { ?>
<!--    <div class="well">
        <fieldset>
            <legend>Sesi <?php // echo $i + 1      ?></legend>

<?php // echo $form->textFieldGroup($djadwal, '[' . $i . ']SESSION', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'placeholder' => 'Sesi')))); ?>

            Sesi Kosong ? <input type="checkbox" name="formsesi[]" value="Yes" />
            <BR>
            <BR>
<?php
//            $kuliah = CHtml::listData(Kurikulum::model()->findAll(array(
//                                'condition' => "ID_KUR = '$last'",)), 'KODE_MK', 'KODE_MK');
//
//            echo $form->dropDownListGroup($djadwal, '[' . $i . ']KODE_MK', array(
//                'wrapperHtmlOptions' => array(
//                    'class' => 'col-sm-5',
//                ),
//                'widgetOptions' => array(
//                    'data' => $kuliah,
//                    'htmlOptions' => array(
//                        'ajax' => array(
//                            'type' => 'POST',
//                            'url' => CController::createUrl('Jadwal/deskripsi'),
//                            'update' => '#agan'
//                        )
//                    ),
//                )
//                    )
//            );
?>

<?php
//            $data = CHtml::listData(Ruangan ::model()->findAll(), 'ID', 'SHORT_NAME');
//            echo $form->dropDownListGroup($djadwal, '[' . $i . ']RUANGAN', array('wrapperHtmlOptions' => array(
//                    'class' => 'col-sm-5',
//                ),
//                'widgetOptions' => array(
//                    'data' => $data,
//                    'htmlOptions' => array(
//                    ),
//                )
//                    )
//            );
?>
<?php // echo $form->dropDownListGroup($djadwal, '[' . $i . ']AKTIFITAS', array('widgetOptions' => array('data' => array("Teori" => "Teori", "Praktikum" => "Praktikum", "Mandiri" => "Mandiri",), 'htmlOptions' => array('class' => 'input-large', 'placeholder' => 'Aktifitas')))); ?>



        </fieldset>
    </div>-->
<?php // } ?>

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
