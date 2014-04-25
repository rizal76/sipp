<?php
/* @var $this PelamarController */
/* @var $model Pelamar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pelamar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          'class'=>'span12',
                          'enctype'=>'multipart/form-data',
                 )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'no_ktp'); ?>
		<?php echo $form->textField($model,'no_ktp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'no_ktp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
	<?php 	
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'tanggal_lahir',
			    'model'=>$model,
				'attribute'=>'tanggal_lahir',
				
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dateFormat'=>'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;'
			    ),
			)); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php echo $form->dropDownList($model,'jenis_kelamin',array(
				'Male'=>'Male', 
				'Female'=>'Female')); ?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array(
				'Belum_Menikah'=>'Belum_Menikah', 
				'Menikah'=>'Menikah',
				'Duda'=>'Duda', 
				'Janda'=>'Janda',
				)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_anak'); ?>
		<?php echo $form->textField($model,'jumlah_anak'); ?>
		<?php echo $form->error($model,'jumlah_anak'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kota'); ?>
		<?php echo $form->textField($model,'kota',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'kota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tlp'); ?>
		<?php echo $form->textField($model,'tlp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tlp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pendidikan'); ?>
		<?php echo $form->textField($model,'pendidikan',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pendidikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenjang'); ?>
		<?php echo $form->textField($model,'jenjang',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'jenjang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jurusan'); ?>
		<?php echo $form->textField($model,'jurusan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jurusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_lulus'); ?>
		<?php echo $form->textField($model,'tahun_lulus',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tahun_lulus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skill'); ?>
		<?php echo $form->textField($model,'skill',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'skill'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover_letter'); ?>
		<?php echo $form->textArea($model,'cover_letter',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'cover_letter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->fileField($model,'cv',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'cv'); ?>
	</div>
			<!-- 
		//untuk pengalaman kerja array -->
	<div id="pengalaman">
		<?php foreach($pengalamans as $i=>$item): ?>
		nama_perusahaan <?php echo CHtml::activeTextField($item,"[$i]nama_perusahaan"); ?>
		gaji_terkahir <?php echo CHtml::activeTextField($item,"[$i]gaji_terkahir"); ?>
		tanggal_mulai <?php echo CHtml::activeDateField($item,"[$i]tanggal_mulai"); ?>
		tanggal_akhir <?php echo CHtml::activeDateField($item,"[$i]tanggal_akhir"); ?>
		posisi <?php echo CHtml::activeTextField($item,"[$i]posisi"); ?>
		jenis <?php echo CHtml::activeTextField($item,"[$i]jenis"); ?>
		alasan_berhenti <?php echo CHtml::activeTextArea($item,"[$i]alasan_berhenti"); ?>
		
		<?php endforeach; ?>

		
	</div>
	<div id="add-pengalaman" onclick="tambah()">tambah</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<!-- untuk tambah pengalaman -->
<script type="text/javascript">
		var jumlah = <?php echo count($pengalamans); ?>;
		function tambah() {
		  	alert('aa' + jumlah );
		    var isi = 'nama_perusahaan <input name="PengalamanKerja['+jumlah+'][nama_perusahaan]" id="PengalamanKerja_'+jumlah+'_nama_perusahaan" type="text">';
			isi+=  'gaji_terkahir <input name="PengalamanKerja['+jumlah+'][gaji_terkahir]" id="PengalamanKerja_'+jumlah+'_gaji_terkahir" type="text" maxlength="30" />		tanggal_mulai <input name="PengalamanKerja['+jumlah+'][tanggal_mulai]" id="PengalamanKerja_'+jumlah+'_tanggal_mulai" type="date" />		tanggal_akhir <input name="PengalamanKerja['+jumlah+'][tanggal_akhir]" id="PengalamanKerja_'+jumlah+'_tanggal_akhir" type="date" />		posisi <input name="PengalamanKerja['+jumlah+'][posisi]" id="PengalamanKerja_'+jumlah+'_posisi" type="text" maxlength="20" />		jenis <input name="PengalamanKerja['+jumlah+'][jenis]" id="PengalamanKerja_'+jumlah+'_jenis" type="text" maxlength="20" />		alasan_berhenti <textarea name="PengalamanKerja['+jumlah+'][alasan_berhenti]" id="PengalamanKerja_'+jumlah+'_alasan_berhenti"></textarea>	';			
			$("#pengalaman").append(isi); 
			jumlah++;       // Append new elements
		  }
</script>