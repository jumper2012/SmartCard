<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$tempMessg = explode("_", $data);
$message = $tempMessg[0];
$message2 = $tempMessg[1];
?>

<?php
$session = array();
//$tempSesi =
?>

<table>
<tr>
    <td width="1300">
        <?php
        $data = $message."_".$message2;
        $this->widget('zii.widgets.jui.CJuiAccordion', array(
            'panels'=>array(
                'Grafik Mingguan Teori'=> $this->renderPartial('_viewGrafikMingguanTeori',$data,true),
                'Tabel Mingguan Teori'=> $this->renderPartial('_viewTabelMingguanTeori',$data,true),
                'Grafik Mingguan Praktikum'=> $this->renderPartial('_viewGrafikMingguanPraktikum',$data,true),
                'Tabel Mingguan Praktikum'=> $this->renderPartial('_viewTabelMingguanPraktikum',$data,true),
                //'panel 3'=>$this->renderPartial('_partial',null,true),
            ),
            'options'=>array(
                'animated'=>'bounceslide',
            ),
        ));
        ?>
    </td>
</tr>
</table>