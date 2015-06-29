<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::app()->session['var'] = $message;
$temp = explode("-", $message);
$Kode = $temp[0];
$Kelas = $temp[1];
$TA = $temp[2];

$mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode));
?>



<table>
    <tr>
        <td colspan="2">
            <fieldset>
            <legen>Sort berdasarkan tanggal</legen>
            <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
                'id'=>'MJadwal',
                'type'=>'inline',
                'enableAjaxValidation'=>false,
            )); ?>

            <div class="form-actions">
                <?php echo $form->datePickerGroup($model,'TANGGAL',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
                <?php $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context'=>'primary',
                    'label'=>'Search',
                )); ?>
            </div>
            <?php $this->endWidget(); ?>
            </fieldset>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" valign="middle">
            <?php
            $data = $message."_".$message2;
            $this->widget('zii.widgets.jui.CJuiTabs', array(
                'tabs'=>array(
                    'Grafik Mingguan' => $this->renderPartial('_viewGrafikTabelMingguan',$data,true),
                    'Grafik & Tabel Bulanan'=> $this->renderPartial('_viewGrafikTabelBulanan',$data,true),
                ),
                'options'=>array(
                    'collapsible'=>true,
                ),
            ));
            ?>
        </td>
    </tr>
</table>