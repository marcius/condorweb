<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_controparte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_controparte), array('view', 'id'=>$data->id_controparte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('millesimi')); ?>:</b>
	<?php echo CHtml::encode($data->millesimi); ?>
	<br />


</div>