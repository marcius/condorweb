<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pagamento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pagamento), array('view', 'id'=>$data->id_pagamento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_transazione')); ?>:</b>
	<?php echo CHtml::encode($data->id_transazione); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cassa')); ?>:</b>
	<?php echo CHtml::encode($data->id_cassa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importo')); ?>:</b>
	<?php echo CHtml::encode($data->importo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_pagam')); ?>:</b>
	<?php echo CHtml::encode($data->data_pagam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_pagam')); ?>:</b>
	<?php echo CHtml::encode($data->des_pagam); ?>
	<br />


</div>