<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model, $admin); ?>


	<div class="row">
		<?php echo $form->textField($model,'username',array('placeholder'=>'masukan username', 'id'=>'nama', 'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'masukan password','id'=>'password', 'size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
			<?php echo $form->dropDownList($admin,'departemen', array(
				'SIS'=>'SIS', 
				'COM'=>'COM',
				'PMO'=>'PMO',
				'PRD'=>'PRD',
				'IMP'=>'IMP',
				'KOU'=>'KOU'

				)); 
			?>
			<?php echo $form->error($admin,'departemen'); ?>
	</div>

     <?php if (extension_loaded('gd')): ?> 
        <div class="row" style="text-align: center;"> 
            <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?> 
            <div> 
                <?php $this->widget('CCaptcha'); ?><br/> 
                
            </div> 
            <div class="hint">Ketik tulisan yang ada pada gambar . 
            <br/>Tulisan tidak case sensitive</div> 
        </div> 
        <?php echo CHtml::activeTextField($model,'verifyCode'); ?> 
    <?php endif; ?> 



	<div class="row buttons">
		<p class="login button">
		<?php echo CHtml::submitButton( $model->isNewRecord ? 'Create' : 'Save',  array(
        'value'=>'Daftar' )); ?>
		</p>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->