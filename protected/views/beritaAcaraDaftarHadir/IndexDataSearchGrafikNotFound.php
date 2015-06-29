<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

BeritaAcaraDaftarHadir::$tempID = $message;

$temp = explode("-", $message);
$Kode = $temp[0];
$Kelas = $temp[1];
$TA = $temp[2];
?>
<?php

$mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode));
$myValue = "Load content Ajax";
?>
<table>
    <tr>
        <td colspan="2" align="center" valign="middle"><center>
                <?php $this->widget('ext.simple-calendar-chart.SimpleCalendarWidget'); ?></center>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" valign="middle">
            Data pada Current Date tidak ditemukan !
        </td>
    </tr>
</table>