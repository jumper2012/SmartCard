<div class="page-header">
    <h1>Buat Jadwal Baru<small> &nbsp;&nbsp;&nbsp;<?php echo "Satu Kelas Satu Hari Delapan Sesi" ?></small></h1>
</div>

<?php echo $this->renderPartial('_formJadwal', array('model' => $model, 'djadwal' => $djadwal, 'kbk' => $kbk)); ?>