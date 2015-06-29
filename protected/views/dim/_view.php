<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NIM),array('view','id'=>$data->NIM)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_USM')); ?>:</b>
	<?php echo CHtml::encode($data->NO_USM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JALUR')); ?>:</b>
	<?php echo CHtml::encode($data->JALUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->USER_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KBK_ID')); ?>:</b>
	<?php echo CHtml::encode($data->KBK_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KPT_PRODI')); ?>:</b>
	<?php echo CHtml::encode($data->KPT_PRODI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_KUR')); ?>:</b>
	<?php echo CHtml::encode($data->ID_KUR); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGL_LAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->TGL_LAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TEMPAT_LAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->TEMPAT_LAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GOL_DARAH')); ?>:</b>
	<?php echo CHtml::encode($data->GOL_DARAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JENIS_KELAMIN')); ?>:</b>
	<?php echo CHtml::encode($data->JENIS_KELAMIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AGAMA')); ?>:</b>
	<?php echo CHtml::encode($data->AGAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KABUPATEN')); ?>:</b>
	<?php echo CHtml::encode($data->KABUPATEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KODE_POS')); ?>:</b>
	<?php echo CHtml::encode($data->KODE_POS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEPON')); ?>:</b>
	<?php echo CHtml::encode($data->TELEPON); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HP')); ?>:</b>
	<?php echo CHtml::encode($data->HP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HP2')); ?>:</b>
	<?php echo CHtml::encode($data->HP2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_SMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_SMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_IJAZAH_SMA')); ?>:</b>
	<?php echo CHtml::encode($data->NO_IJAZAH_SMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT_SMA')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT_SMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KABUPATEN_SMA')); ?>:</b>
	<?php echo CHtml::encode($data->KABUPATEN_SMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KODEPOS_SMA')); ?>:</b>
	<?php echo CHtml::encode($data->KODEPOS_SMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEPON_SMA')); ?>:</b>
	<?php echo CHtml::encode($data->TELEPON_SMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('THN_MASUK')); ?>:</b>
	<?php echo CHtml::encode($data->THN_MASUK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS_AKHIR')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS_AKHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_AYAH')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_AYAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_IBU')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_IBU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_HP_AYAH')); ?>:</b>
	<?php echo CHtml::encode($data->NO_HP_AYAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_HP_IBU')); ?>:</b>
	<?php echo CHtml::encode($data->NO_HP_IBU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT_ORANGTUA')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT_ORANGTUA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEKERJAAN_AYAH')); ?>:</b>
	<?php echo CHtml::encode($data->PEKERJAAN_AYAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN_PEKERJAAN_AYAH')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN_PEKERJAAN_AYAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENGHASILAN_AYAH')); ?>:</b>
	<?php echo CHtml::encode($data->PENGHASILAN_AYAH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEKERJAAN_IBU')); ?>:</b>
	<?php echo CHtml::encode($data->PEKERJAAN_IBU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN_PEKERJAAN_IBU')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN_PEKERJAAN_IBU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENGHASILAN_IBU')); ?>:</b>
	<?php echo CHtml::encode($data->PENGHASILAN_IBU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEKERJAAN_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->PEKERJAAN_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN_PEKERJAAN_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN_PEKERJAAN_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENGHASILAN_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->PENGHASILAN_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEPON_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->TELEPON_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_HP_WALI')); ?>:</b>
	<?php echo CHtml::encode($data->NO_HP_WALI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENDAPATAN')); ?>:</b>
	<?php echo CHtml::encode($data->PENDAPATAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IPK')); ?>:</b>
	<?php echo CHtml::encode($data->IPK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ANAK_KE')); ?>:</b>
	<?php echo CHtml::encode($data->ANAK_KE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DARI_JLH_ANAK')); ?>:</b>
	<?php echo CHtml::encode($data->DARI_JLH_ANAK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JUMLAH_TANGGUNGAN')); ?>:</b>
	<?php echo CHtml::encode($data->JUMLAH_TANGGUNGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NILAI_USM')); ?>:</b>
	<?php echo CHtml::encode($data->NILAI_USM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SCORE_IQ')); ?>:</b>
	<?php echo CHtml::encode($data->SCORE_IQ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REKOMENDASI_PSIKOTEST')); ?>:</b>
	<?php echo CHtml::encode($data->REKOMENDASI_PSIKOTEST); ?>
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