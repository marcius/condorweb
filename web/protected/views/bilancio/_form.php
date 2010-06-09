<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bilancio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'anno'); ?>
		<?php echo $form->textField($model,'anno'); ?>
		<?php echo $form->error($model,'anno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voce'); ?>
		<?php echo $form->textField($model,'voce',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'voce'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valore'); ?>
		<?php echo $form->textField($model,'valore',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'valore'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->