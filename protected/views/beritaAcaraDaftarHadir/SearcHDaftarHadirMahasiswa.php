<?php
$this->menu = array(
    array('label' => 'List BeritaAcaraKuliah', 'url' => array('index')),
    array('label' => 'Manage BeritaAcaraKuliah', 'url' => array('admin')),
);
?>

<h1>Find your Berita Acara Daftar Hadir<BR><BR></h1>

<?php echo $this->renderPartial('_formDaftarMahasiswa', array('model' => $model, 'mjadwal' => $mjadwal, 'djadwal' => $djadwal)); ?>