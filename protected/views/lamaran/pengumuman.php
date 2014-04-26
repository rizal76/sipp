<?php 
foreach ($model as $j=>$modelp) {
			echo 'Nama Lowongan: '. $modelp->lowongan->nama.'<br>';
			if(!isset($modelp->proses->deskripsi))
			{
				echo 'sedang seleksi administrasi<br>';
			}
			else{
				//cek kalo ada yang submit tugas
				echo 'sampai tahap: '. $modelp->proses->tahaps->nama.'<br>';
				echo 'Deskripsi Tugas '. $modelp->proses->deskripsi.'<br>';
				echo 'File Tugas '. $modelp->proses->file_tugas.'<br>';
?>
			<!-- kalo belum ngerjain tugas maka suruh kerjain tugas yang hanya bisa 1 kali -->
			<?php if ($modelp->hasil_tugas==null) { ?>
			<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'tahap-form',
				'enableAjaxValidation'=>false,
			)); ?>
				<p class="note">Isi hasil tugas anda </p>

				<?php echo $form->errorSummary($modelp); ?>

				<?php echo $form->hiddenField($modelp,'id',array('value'=>$modelp->id)); ?>
				<div class="row">
					<?php echo $form->labelEx($modelp,'hasil_tugas'); ?>
					<?php echo $form->textField($modelp,'hasil_tugas',array('size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($modelp,'hasil_tugas'); ?>

				</div>
				<div class="row buttons">
					<?php echo CHtml::submitButton($modelp->isNewRecord ? 'Create' : 'Save'); ?>
				</div>	
			<?php $this->endWidget(); ?>

			</div><!-- form -->
			<?php } else echo "anda sudah submit tugas, jawaban anda : ".$modelp->hasil_tugas;  ?>

<?php
			}
			echo "<hr>";
			
}

?>