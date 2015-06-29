<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'berita-acara-kuliah-form',
    'type' => 'inline',
    'enableAjaxValidation' => false,
        ));
?>
<TABLE ALIGN="CENTER">
    <TR ALIGN="CENTER">
        <TD ALIGN="CENTER"><CENTER>
        <h3>Tahun Ajaran</h3></CENTER>
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
    $ta = CHtml::listData(MJadwal::model()->findAll(), 'TA', 'TA');
    echo $form->dropDownListGroup(
            $mjadwal, 'TA', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $ta,
            'htmlOptions' => array(),
        )
            )
    );
    ?>
</CENTER>
</TD>

<TD ALIGN="CENTER"><CENTER>
    <?php //echo $form->textFieldGroup($model,'ID_KUR',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>

    <?php
    $kodemk = CHtml::listData(DJadwal::model()->findAll(), 'KODE_MK', 'KODE_MK');
    echo $form->dropDownListGroup(
            $djadwal, 'KODE_MK', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $kodemk,
            'htmlOptions' => array(),
        )
            )
    );
    ?>

</CENTER>
</TD>
<TD ALIGN="CENTER"><CENTER>
    <?php
    $kelas = CHtml::listData(MJadwal::model()->findAll(), 'KELAS', 'KELAS');
    echo $form->dropDownListGroup(
            $mjadwal, 'KELAS', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $kelas,
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


            <?php $this->endWidget(); ?>


