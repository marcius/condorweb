<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bilancio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bilancio), array('view', 'id'=>$data->id_bilancio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anno')); ?>:</b>
	<?php echo CHtml::encode($data->anno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voce')); ?>:</b>
	<?php echo CHtml::encode($data->voce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valore')); ?>:</b>
	<?php echo CHtml::encode($data->valore); ?>
	<br />


</div>