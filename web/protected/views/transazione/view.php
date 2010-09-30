<?php
$this->breadcrumbs=array(
	'Transaziones'=>array('index'),
	$model->id_transazione,
);

$this->menu=array(
	array('label'=>'List Transazione', 'url'=>array('index')),
	array('label'=>'Create Transazione', 'url'=>array('create')),
	array('label'=>'Update Transazione', 'url'=>array('update', 'id'=>$model->id_transazione)),
	array('label'=>'Delete Transazione', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_transazione),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Transazione', 'url'=>array('admin')),
);
?>

<h1>View Transazione #<?php echo $model->id_transazione; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_transazione',/*
		'tipo_transazione',
		'anno_registrazione',
		'anno_competenza',
		'id_causale',
		'id_cassa',
		'id_controparte',
		'controparte',
		'descrizione',
		'importo',
		'data_doc',
		'riferim_doc',
		'data_pagam',
		'des_pagam',*/
	),
)); ?>
