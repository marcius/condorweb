<?php
$this->breadcrumbs=array(
	'Pagamentos'=>array('index'),
	$model->id_pagamento,
);

$this->menu=array(
	array('label'=>'List Pagamento', 'url'=>array('index')),
	array('label'=>'Create Pagamento', 'url'=>array('create')),
	array('label'=>'Update Pagamento', 'url'=>array('update', 'id'=>$model->id_pagamento)),
	array('label'=>'Delete Pagamento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pagamento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>View Pagamento #<?php echo $model->id_pagamento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_transazione',
		'anno_competenza',
		'id_cassa',
		'importo',
		'data_pagam',
		'des_pagam',
		'id_pagamento',
	),
)); ?>
