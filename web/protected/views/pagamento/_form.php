<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pagamento-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_transazione'); ?>
		<?php echo $form->textField($model,'id_transazione',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_transazione'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anno_competenza'); ?>
		<?php echo $form->textField($model,'anno_competenza',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'anno_competenza'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cassa'); ?>
		<?php echo $form->textField($model,'id_cassa',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'id_cassa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importo'); ?>
		<?php echo $form->textField($model,'importo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'importo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_pagam'); ?>
		<?php echo $form->textField($model,'data_pagam'); ?>
		<?php echo $form->error($model,'data_pagam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des_pagam'); ?>
		<?php echo $form->textField($model,'des_pagam',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'des_pagam'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->