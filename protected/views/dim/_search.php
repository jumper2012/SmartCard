<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'NIM',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldGroup($model,'NO_USM',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'JALUR',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldGroup($model,'USER_NAME',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'KBK_ID',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldGroup($model,'KPT_PRODI',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldGroup($model,'ID_KUR',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'NAMA',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->datepickerGroup($model,'TGL_LAHIR',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldGroup($model,'TEMPAT_LAHIR',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'GOL_DARAH',array('class'=>'span5','maxlength'=>2)); ?>

		<?php echo $form->textFieldGroup($model,'JENIS_KELAMIN',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->textFieldGroup($model,'AGAMA',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textAreaGroup($model,'ALAMAT',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'KABUPATEN',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'KODE_POS',array('class'=>'span5','maxlength'=>5)); ?>

		<?php echo $form->textFieldGroup($model,'EMAIL',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'TELEPON',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'HP',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'HP2',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NAMA_SMA',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NO_IJAZAH_SMA',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textAreaGroup($model,'ALAMAT_SMA',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'KABUPATEN_SMA',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldGroup($model,'KODEPOS_SMA',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldGroup($model,'TELEPON_SMA',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'THN_MASUK',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'STATUS_AKHIR',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NAMA_AYAH',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NAMA_IBU',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NO_HP_AYAH',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NO_HP_IBU',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textAreaGroup($model,'ALAMAT_ORANGTUA',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'PEKERJAAN_AYAH',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textAreaGroup($model,'KETERANGAN_PEKERJAAN_AYAH',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'PENGHASILAN_AYAH',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'PEKERJAAN_IBU',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textAreaGroup($model,'KETERANGAN_PEKERJAAN_IBU',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'PENGHASILAN_IBU',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'NAMA_WALI',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'PEKERJAAN_WALI',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textAreaGroup($model,'KETERANGAN_PEKERJAAN_WALI',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'PENGHASILAN_WALI',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textAreaGroup($model,'ALAMAT_WALI',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldGroup($model,'TELEPON_WALI',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldGroup($model,'NO_HP_WALI',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'PENDAPATAN',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'IPK',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'ANAK_KE',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'DARI_JLH_ANAK',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'JUMLAH_TANGGUNGAN',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'NILAI_USM',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'SCORE_IQ',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'REKOMENDASI_PSIKOTEST',array('class'=>'span5','maxlength'=>4)); ?>

		<?php echo $form->textFieldGroup($model,'LAST_UPDATE',array('class'=>'span5','maxlength'=>14)); ?>

		<?php echo $form->textFieldGroup($model,'USER_ID',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldGroup($model,'WS',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			//'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
