<?php
$sql_id_kur = "SELECT ID_KUR FROM kurikulum ORDER BY ID_KUR DESC LIMIT 1";
$last_id_kur = Yii::app()->db->createCommand($sql_id_kur)->queryAll();
$last = $last_id_kur[0]['ID_KUR'];
?>

<div class="form">

    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'jadwal-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
            ));
    ?>


    <?php echo $form->errorSummary($model); ?>

    <?php
    echo $form->dropDownListGroup(
            $model, 'WEEK', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array(
                '-- Pilih Week --', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'
            ),
            'htmlOptions' => array(),
        )
            )
    );
    ?>

    <?php
    echo $form->datePickerGroup(
            $model, 'TANGGAL', array(
        'widgetOptions' => array(
            'options' => array(
                'showButtonPanel' => true,
                //'dateFormat' => 'yy-mm-dd',
                'todayHighlight' => true,
                'todayBtn' => "linked",
            ),
            'htmlOptions' => array(
                'class' => 'span5'
            )
        ),
        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Pilih Tanggal!'
            )
    );
    ?>

    <?php
    echo $form->dropDownListGroup(
            $model, 'SESSION', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array(
                '-- Pilih Session --', '1', '2', '3', '4', '5', '6', '7', '8'
            ),
            'htmlOptions' => array(),
        )
            )
    );
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
                'prompt' => '--Select ID Kurikulum--',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('Jadwal/matkul'),
                    'update' => '#' . CHtml::activeID($model, 'KODE_MK'),
                ),
            ),
        )
            )
    );
    ?>

    <?php
    $kuliah = CHtml::listData(Kurikulum::model()->findAll(array(
                        'condition' => "ID_KUR = '$last'",
                    )), 'KODE_MK', 'KODE_MK');

    echo $form->dropDownListGroup(
            $model, 'KODE_MK', array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $kuliah,
            'htmlOptions' => array(
                'prompt' => '--ID Kurikulum Belum Dipilih--',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('Jadwal/deskripsi'),
                    'update' => '#agan'
                )
            ),
        )
            )
    );
    ?>

    <?php
//    echo $form->select2Group(
//            $model, 'KODE_MK', array(
//        'wrapperHtmlOptions' => array(
//            'class' => 'col-sm-5',
//        ),
//        'widgetOptions' => array(
//            'data' => array(),
//            'htmlOptions' => array(
//                'multiple' => true,
//            ),
//        )
//            )
//    );
    ?>

    <?php
    $data = CHtml::listData(Ruangan::model()->findAll(), 'ID', 'SHORT_NAME');
    echo $form->dropDownListGroup(
            $model, 'RUANGAN', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $data,
            'htmlOptions' => array(
                'prompt' => '--Select Ruangan--',
            ),
        )
            )
    );
    ?>

    <?php echo $form->textFieldGroup($model, 'TOPIK', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

    <?php echo $form->textAreaGroup($model, 'SUB_TOPIK', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

    <?php echo $form->textAreaGroup($model, 'OBJEKTIF', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

    <?php
    echo $form->dropDownListGroup(
            $model, 'AKTIFITAS', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array('1' => 'Teori', '2' => 'Praktikum', '3' => 'Mandiri'),
            'htmlOptions' => array(),
        )
            )
    );
    ?>

    <?php
    $pic = CHtml::listData(Pegawai::model()->findAll(
                            array(
                                'order' => 'NAMA ASC',
                                'distinct' => true,)
                    ), 'ID', 'NAMA');

    echo $form->dropDownListGroup(
            $model, 'PIC', array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $pic,
            'htmlOptions' => array(
                'prompt' => '--Select PIC--',
            ),
        )
            )
    );
    ?>

    <?php //echo $form->textAreaGroup($model, 'METODE', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8'))));                ?>

    <?php //echo $form->textAreaGroup($model, 'ALAT_BANTU', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8'))));                 ?>

    <?php //echo $form->textFieldGroup($model, 'KET', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255))));                 ?>

    <?php //echo $form->textFieldGroup($model, 'LAST_UPDATE', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20))));                 ?>

    <?php //echo $form->textFieldGroup($model, 'USER_ID', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 15))));                 ?>

    <?php //echo $form->textFieldGroup($model, 'WS', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 15))));                 ?>

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
</div>

