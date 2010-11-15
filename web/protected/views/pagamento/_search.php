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
		<?php echo $form->label($model,'id_cassa'); ?>
		<?php echo $form->textField($model,'id_cassa',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importo'); ?>
		<?php echo $form->textField($model,'importo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_pagam'); ?>
		<?php echo $form->textField($model,'data_pagam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_pagam'); ?>
		<?php echo $form->textField($model,'des_pagam',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pagamento'); ?>
		<?php echo $form->textField($model,'id_pagamento',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->