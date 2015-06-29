<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo "<img src=\"images/lapetq.jpg\">"; ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
                                 array('label'=>'Grafik Kehadiran',  'items'=>array(
                                      array('label'=>'Absensi','items'=>array(
                                                array('label'=>'Harian','url'=>array('/site/ViewGrade')),
                                                array('label'=>'Bulanan', 'url'=>array('/site/ViewGrade')),
                                                array('label'=>'Periode', 'url'=>array('/site/ViewGrade')),
                                            ), ),
                                      array('label'=>'Keterlambatan','items'=>array(
                                                array('label'=>'Harian','url'=>array('/site/ViewGrade')),
                                                array('label'=>'Bulanan', 'url'=>array('/site/ViewGrade')),
                                                array('label'=>'Periode', 'url'=>array('/site/ViewGrade')),
                                            ),),
                                      array('label'=>'Ketidakhadiran','items'=>array(
                                                array('label'=>'Harian','url'=>array('/site/ViewGrade')),
                                                array('label'=>'Bulanan', 'url'=>array('/site/ViewGrade')),
                                                array('label'=>'Periode', 'url'=>array('/site/ViewGrade')),
                                            ),),
                                        ), ),
                                 array('label'=>'Laporan',
                                      'items'=>array(
                                      array('label'=>'Absensi','items'=>array(
                                                array('label'=>'Harian','items'=>array(
                                                      array('label'=>'Sort By Session','url'=>array('/BeritaAcaraKuliah/AdminEdit', 'id'=>date('Y-m-d'))),
                                                      array('label'=>'Sort By Class', 'url'=>array('/BeritaAcaraKuliah/AdminEdit', 'id'=>date('Y-m-d'))),
                                                ),),
                                                array('label'=>'Mingguan', 'items'=>array(
                                                      array('label'=>'Sort By Session','url'=>array('/BeritaAcaraKuliah/ViewGrade')),
                                                      array('label'=>'Sort By Class', 'url'=>array('/BeritaAcaraKuliah/ViewGrade')),
                                                ),),
                                                array('label'=>'Bulanan', 'items'=>array(
                                                      array('label'=>'Sort By Session','url'=>array('/BeritaAcaraKuliah/ViewGrade')),
                                                      array('label'=>'Sort By Class', 'url'=>array('/BeritaAcaraKuliah/ViewGrade')),
                                                ),),
                                            ), ),
                                      array('label'=>'Keterlambatan','items'=>array(
                                                array('label'=>'Harian','url'=>array('/')),
                                                array('label'=>'Bulanan', 'url'=>array('/')),
                                                array('label'=>'Periode', 'url'=>array('')),
                                            ),),
                                      array('label'=>'Ketidakhadiran','items'=>array(
                                                array('label'=>'Harian','url'=>array('/')),
                                                array('label'=>'Bulanan', 'url'=>array('/')),
                                                array('label'=>'Periode', 'url'=>array('')),
                                            ),),
                                        ), 
                                     ),

				array('label'=>'Manage Jadwal', 'url'=>array('/jadwal/admin')),
                                array('label'=>'Manage Mahasiswa', 'url'=>array('/dim/admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
