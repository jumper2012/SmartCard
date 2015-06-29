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
$a = 0;
$b = 1;
echo $form->dropDownListGroup(
        $model, 'ID_KUR', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => $idkur,
        'htmlOptions' => array(
            'ajax' => array(
                'type' => 'POST',
                'url' => CController::createUrl('MJadwal/matkuljadwal&kbk=' . $kbk->KBK_ID),
                'update' => '#DJadwal_0_KODE_MK,#DJadwal_1_KODE_MK,#DJadwal_2_KODE_MK,#DJadwal_3_KODE_MK,#DJadwal_4_KODE_MK,#DJadwal_5_KODE_MK,#DJadwal_6_KODE_MK,#DJadwal_7_KODE_MK'
            ),
        ),
    )
        )
);
?>

<BR><BR>
<?php for ($i = 0; $i < 8; $i++) { ?>
    <div class="well">
        <fieldset>
            <legend>Sesi <?php echo $i + 1 ?>&nbsp;&nbsp;&nbsp;<small><?php echo sessionTime($i + 1); ?></SMALL></legend>

            <?php // echo $form->textFieldGroup($djadwal, '[' . $i . ']SESSION', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'placeholder' => 'Sesi'))));   ?>

            Sesi Kosong ? <input type="checkbox" name="formsesi<?php echo $i ?>" value="Yes" />
            <BR>
            <BR>

            <?php
            $kuliah = CHtml::listData(Kurikulum::model()->findAll(array(
                                'condition' => "ID_KUR = '$last' AND (KBK_ID LIKE '$kbk->KBK_ID' OR KBK_ID LIKE 'all')",)), 'KODE_MK', 'KODE_MK');

            echo $form->dropDownListGroup($djadwal, '[' . $i . ']KODE_MK', array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => $kuliah,
                    'htmlOptions' => array(
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('MJadwal/deskripsi&id=' . $i),
                            'update' => "#matkul$i"
                        )
                    ),
                )
                    )
            );
            ?>
            <div id="matkul<?php echo $i; ?>" class="alert alert-info"></div>

            <?php
            $data = CHtml::listData(Ruangan ::model()->findAll(), 'ID', 'SHORT_NAME');
            echo $form->dropDownListGroup($djadwal, '[' . $i . ']RUANGAN', array('wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => $data,
                    'htmlOptions' => array(
                    ),
                )
                    )
            );
            ?>
            <?php echo $form->dropDownListGroup($djadwal, '[' . $i . ']AKTIFITAS', array('widgetOptions' => array('data' => array("Teori" => "Teori", "Praktikum" => "Praktikum", "Mandiri" => "Mandiri",), 'htmlOptions' => array('class' => 'input-large', 'placeholder' => 'Aktifitas')))); ?>



        </fieldset>
    </div>
<?php } ?>

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

<?php

function sessionTime($session) {
    switch ($session) {
        case 1:
            return "08:00:00 - 09:00:00";
            break;
        case 2:
            return "09:00:00 - 10:00:00";
            break;
        case 3:
            return "10:00:00 - 11:00:00";
            break;
        case 4:
            return "11:00:00 - 12:00:00";
            break;
        case 5:
            return "13:00:00 - 14:00:00";
            break;
        case 6:
            return "14:00:00 - 15:00:00";
            break;
        case 7:
            return "15:00:00 - 16:00:00";
            break;
        case 8:
            return "16:00:00 - 17:00:00";
            break;
    }
}
?>
