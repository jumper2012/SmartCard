<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'berita-acara-kuliah-form',
    'type' => 'inline',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>
<?php //echo $form->textFieldGroup($model,'WEEK',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php //echo $form->textFieldGroup($model,'SESSION',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<TABLE ALIGN="CENTER">
    <TR ALIGN="CENTER">
        <TD ALIGN="CENTER"><CENTER>
        <h3>Tahun Ajaran</h3></CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <h3>Semester</h3></CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <h3>Kode Mata Kuliah</h3></CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <h3>Kelas</h3></CENTER>
<TD>

    </TR>
<TR ALIGN="CENTER">
    <TD ALIGN="CENTER">
<CENTER>
    <?php
    $data = CHtml::listData(Jadwal::model()->findAll(), 'TA', 'TA');
    echo $form->dropDownListGroup(
            $model, 'TA', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $data,
            'htmlOptions' => array(),
        )
            )
    );
    ?>
</CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <?php
    $data = CHtml::listData(BeritaAcaraKuliah::model()->findAll(), 'SEM', 'SEM');
    echo $form->dropDownListGroup(
            $model, 'SEM', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $data,
            'htmlOptions' => array(),
        )
            )
    );
    ?>
</CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <?php //echo $form->textFieldGroup($model,'ID_KUR',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php
    $data = CHtml::listData(Jadwal::model()->findAll(), 'KODE_MK', 'KODE_MK');
    echo $form->dropDownListGroup(
            $model, 'KODE_MK', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $data,
            'htmlOptions' => array(),
        )
            )
    );
    ?>

</CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <?php
    $data = CHtml::listData(Jadwal::model()->findAll(), 'KELAS', 'KELAS');
    echo $form->dropDownListGroup(
            $model, 'KELAS', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $data,
            'htmlOptions' => array(),
        )
            )
    );
    ?>
    <CENTER>
        </TD>
        </TR>
        <TR >
            <TD ALIGN="CENTER" COLSPAN="4" ><CENTER>
            <div class="form-actions">
                <?php
                $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context' => 'primary',
                    'label' => $model->isNewRecord ? 'Search' : 'Save',
                ));
                ?>
            </div>
        </CENTER>
        <TD>
            </TR>
            </TABLE>





            <?php //echo $form->datePickerGroup($model,'TANGGAL',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

            <?php //echo $form->textFieldGroup($model,'START_TIME',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

            <?php //echo $form->textFieldGroup($model,'END_TIME',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

            <?php //echo $form->textAreaGroup($model,'TOPIK', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

            <?php //echo $form->textFieldGroup($model,'RUANGAN',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

            <?php //echo $form->textFieldGroup($model,'AKTIFITAS',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15)))); ?>

            <?php //echo $form->textFieldGroup($model,'PIC',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

            <?php //echo $form->dropDownListGroup($model,'TIPE_KULIAH', array('widgetOptions'=>array('data'=>array("Regular"=>"Regular","Pengganti"=>"Pengganti",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

            <?php //echo $form->textAreaGroup($model,'METODE', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

            <?php //echo $form->textAreaGroup($model,'ALAT_BANTU', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

            <?php //echo $form->textAreaGroup($model,'CATATAN', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

            <?php //echo $form->textFieldGroup($model,'LAST_UPDATE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

            <?php //echo $form->textFieldGroup($model,'USER_ID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15)))); ?>

            <?php //echo $form->textFieldGroup($model,'WS',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15))));  ?>

            <?php $this->endWidget(); ?>


