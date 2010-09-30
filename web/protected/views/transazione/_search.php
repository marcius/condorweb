<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_transazione'); ?>
		<?php echo $form->textField($model,'id_transazione',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_transazione'); ?>
		<?php echo $form->textField($model,'tipo_transazione',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anno_registrazione'); ?>
		<?php echo $form->textField($model,'anno_registrazione',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anno_competenza'); ?>
		<?php echo $form->textField($model,'anno_competenza',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_causale'); ?>
		<?php echo $form->textField($model,'id_causale',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cassa'); ?>
		<?php echo $form->textField($model,'id_cassa',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_controparte'); ?>
		<?php echo $form->textField($model,'id_controparte'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'controparte'); ?>
		<?php echo $form->textField($model,'controparte',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descrizione'); ?>
		<?php echo $form->textField($model,'descrizione',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importo'); ?>
		<?php echo $form->textField($model,'importo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_doc'); ?>
		<?php echo $form->textField($model,'data_doc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riferim_doc'); ?>
		<?php echo $form->textField($model,'riferim_doc',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_pagam'); ?>
		<?php echo $form->textField($model,'data_pagam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_pagam'); ?>
		<?php echo $form->textField($model,'des_pagam',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->