<section id="navigation-main">  
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'nav'),
                        'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                        'itemCssClass' => 'item-test',
                        'encodeLabel' => false,
                        'items' => array(
                            array('label' => 'Home', 'url' => array('/site/index'), 'linkOptions' => array("data-description" => "Beranda")),
                            array('label' => 'Manage Jadwal <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Manage Jadwal disini!"),
                                'items' => array(
                                    array('label' => 'Create Jadwal', 'url' => array('/MJadwal/create')),
                                    array('label' => 'Upload Jadwal', 'url' => array('/site/upload')),
                                    array('label' => 'Daftar Jadwal', 'url' => array('MJadwal/index')),
                                    array('label' => 'Upload Daftar Kehadiran', 'url' => array('BeritaAcaraDaftarHadir/absen')),
                                )),
                            array('label' => 'Laporan <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Absensi"),
                                'items' => array(
                                    array('label' => 'Search by Date', 'url' => array('/BeritaAcaraKuliah/AdminByDate', 'id' => date('Y-m-d'))),
                                    array('label' => 'Berita Acara Kuliah', 'url' => array('BeritaAcaraKuliah/CetakBeritaAcaraKuliah')),
                                    array('label' => 'Daftar Hadir', 'url' => array('BeritaAcaraDaftarHadir/searchBeritaAcaraDaftarHadir')),
                                )),
//                            array('label' => 'Manage Mahasiswa', 'url' => array('/dim/admin'), 'linkOptions' => array("data-description" => "Manage Mahasiswa disini!")),
//                        array('label'=>'Background <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"Choose your Color!"), 
//                        'items'=>array(
//                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Blue', 'url'=>"javascript:chooseStyle('none', 60)"),
//                            array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Pink', 'url'=>"javascript:chooseStyle('style2', 60)"),
//                            array('label'=>'<span class="style" style="background-color:#c80681;"></span> Purple', 'url'=>"javascript:chooseStyle('style3', 60)"),
//                            
//                        )),
                            array('label' => 'Grafik Daftar Kehadiran <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Grafik Kehadiran"),
                                'items' => array(
                                    array('label' => 'Grafik Daftar Kehadiran', 'url' => array('BeritaAcaraDaftarHadir/searchGrafikBeritaAcaraDaftarHadir')),
                                    array('label' => 'Search by NIM', 'url' => array('BeritaAcaraDaftarHadir/searchGrafikDaftarHadirMahasiswa')),
                                //array('label' => 'Daftar Hadir', 'url' => array('BeritaAcaraDaftarHadir/searchBeritaAcaraDaftarHadir')),
                                )), array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area")),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')<span class="caret"></span>', 'url' => '#', 'itemOptions', 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Change Password & Logout"),
                                'items' => array(
                                    array('label' => 'Change Password', 'url' => array('/Account/Update2', 'id' => Yii::app()->user->id)),
                                    array('label' => 'Logout', 'url' => array('Site/logout')),
                                //array('label' => 'Daftar Hadir', 'url' => array('BeritaAcaraDaftarHadir/searchBeritaAcaraDaftarHadir')),
                                )),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /#navigation-main -->