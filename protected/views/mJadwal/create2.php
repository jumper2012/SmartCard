<div class="page-header">
    <h1>Buat Jadwal Baru<small> &nbsp;&nbsp;&nbsp;<?php echo "Satu Kelas Satu Hari Delapan Sesi" ?></small></h1>
</div>

<?php
for ($i = 0; $i < $jumlah; $i++) {
    echo "<center>";
    echo CHtml::button($kbk[$i]['JENJANG'] . " (" . $kbk[$i]['KBK_IND'] . ") ", array('submit' => array('MJadwal/createjadwal', 'kbk' => $kbk[$i]['KBK_ID']), 'class' => 'btn btn-large btn-info'));

    echo "</center><br/>";
}
?>