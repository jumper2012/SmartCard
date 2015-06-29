<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIP')); ?>:</b>
	<?php echo CHtml::encode($data->NIP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KPT_NO')); ?>:</b>
	<?php echo CHtml::encode($data->KPT_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->USER_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('POSISI')); ?>:</b>
	<?php echo CHtml::encode($data->POSISI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALIAS')); ?>:</b>
	<?php echo CHtml::encode($data->ALIAS); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TGL_LAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->TGL_LAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TEMPAT_LAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->TEMPAT_LAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JENIS_KELAMIN')); ?>:</b>
	<?php echo CHtml::encode($data->JENIS_KELAMIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GOL_DARAH')); ?>:</b>
	<?php echo CHtml::encode($data->GOL_DARAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGL_MASUK')); ?>:</b>
	<?php echo CHtml::encode($data->TGL_MASUK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGL_KELUAR')); ?>:</b>
	<?php echo CHtml::encode($data->TGL_KELUAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AGAMA')); ?>:</b>
	<?php echo CHtml::encode($data->AGAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KBK_ID')); ?>:</b>
	<?php echo CHtml::encode($data->KBK_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EXT_NUM')); ?>:</b>
	<?php echo CHtml::encode($data->EXT_NUM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HP')); ?>:</b>
	<?php echo CHtml::encode($data->HP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT_LIBUR')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT_LIBUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KOTA')); ?>:</b>
	<?php echo CHtml::encode($data->KOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KODE_POS')); ?>:</b>
	<?php echo CHtml::encode($data->KODE_POS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEPON')); ?>:</b>
	<?php echo CHtml::encode($data->TELEPON); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KTP')); ?>:</b>
	<?php echo CHtml::encode($data->KTP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENDIDIKAN')); ?>:</b>
	<?php echo CHtml::encode($data->PENDIDIKAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JABATAN')); ?>:</b>
	<?php echo CHtml::encode($data->JABATAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENDIDIKAN_TERTINGGI')); ?>:</b>
	<?php echo CHtml::encode($data->PENDIDIKAN_TERTINGGI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STUDY_AREA1')); ?>:</b>
	<?php echo CHtml::encode($data->STUDY_AREA1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STUDY_AREA2')); ?>:</b>
	<?php echo CHtml::encode($data->STUDY_AREA2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_BAPAK')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_BAPAK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_IBU')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_IBU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEKERJAAN_ORTU')); ?>:</b>
	<?php echo CHtml::encode($data->PEKERJAAN_ORTU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_P')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_P); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TMP_LAHIR_P')); ?>:</b>
	<?php echo CHtml::encode($data->TMP_LAHIR_P); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGL_LAHIR_P')); ?>:</b>
	<?php echo CHtml::encode($data->TGL_LAHIR_P); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KET')); ?>:</b>
	<?php echo CHtml::encode($data->KET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS_AKHIR')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS_AKHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WS')); ?>:</b>
	<?php echo CHtml::encode($data->WS); ?>
	<br />

	*/ ?>

</div>