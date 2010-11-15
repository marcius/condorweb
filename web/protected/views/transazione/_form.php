<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transazione-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_transazione'); ?>
                <?php echo $form->dropDownList($model,'tipo_transazione',
                    array('U'=>'Uscita', 'E'=>'Entrata', 'G'=>'Giroconto')
                    ); ?>
            <?php echo $form->error($model,'tipo_transazione'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anno_registrazione'); ?>
		<?php echo $form->textField($model,'anno_registrazione',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'anno_registrazione'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anno_competenza'); ?>
		<?php echo $form->textField($model,'anno_competenza',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'anno_competenza'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_causale'); ?>
                <?php echo $form->dropDownList($model,'id_causale',
                    CHtml::listData(Causale::model()->findAll(),'id_causale','descrizione'),
                    array('prompt'=>' ')
                    ); ?>
		<?php echo $form->error($model,'id_causale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_controparte'); ?>
                <?php echo $form->dropDownList($model,'id_controparte',
                    CHtml::listData(Soggetto::model()->ordinati()->findAll(/*'tipo=:tipo', array(':tipo'=>'c')*/),
                        'id_controparte','nome'),
                        array('prompt'=>' ')
                    ); ?>
		<?php echo $form->error($model,'id_controparte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrizione'); ?>
		<?php echo $form->textField($model,'descrizione',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'descrizione'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importo'); ?>
		<?php echo $form->textField($model,'importo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'importo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_doc'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'data_doc',
                        'options'=>array(
                            'dateFormat'=>'yy-mm-dd',
                        ),
                    ));
                 ?>
                <?php echo $form->error($model,'data_doc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'riferim_doc'); ?>
		<?php echo $form->textField($model,'riferim_doc',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'riferim_doc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->