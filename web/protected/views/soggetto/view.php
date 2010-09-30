<?php
$this->breadcrumbs=array(
	'Soggettos'=>array('index'),
	$model->id_controparte,
);

$this->menu=array(
	array('label'=>'List Soggetto', 'url'=>array('index')),
	array('label'=>'Create Soggetto', 'url'=>array('create')),
	array('label'=>'Update Soggetto', 'url'=>array('update', 'id'=>$model->id_controparte)),
	array('label'=>'Delete Soggetto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_controparte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Soggetto', 'url'=>array('admin')),
);
?>

<h1>View Soggetto #<?php echo $model->id_controparte; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_controparte',
		'tipo',
		'nome',
		'millesimi',
	),
)); ?>
