<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<?php
	if (Yii::app()->controller->action->id == 'create' ) {
?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
<?php
	} else {
?>
	<div class="row" style="display: none; visibility: hidden;">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
<?php
	}
?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>


     <?php if (extension_loaded('gd')): ?> 
        <div class="row"> 
            <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?> 
            <div> 
                <?php $this->widget('CCaptcha'); ?><br/> 
                <?php echo CHtml::activeTextField($model,'verifyCode'); ?> 
            </div> 
            <div class="hint">Ketik tulisan yang ada pada gambar . 
            <br/>Tulisan tidak case sensitive</div> 
        </div> 
    <?php endif; ?> 



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->