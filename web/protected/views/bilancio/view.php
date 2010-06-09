<?php
$this->breadcrumbs=array(
	'Bilancios'=>array('index'),
	$model->id_bilancio,
);

$this->menu=array(
	array('label'=>'List Bilancio', 'url'=>array('index')),
	array('label'=>'Create Bilancio', 'url'=>array('create')),
	array('label'=>'Update Bilancio', 'url'=>array('update', 'id'=>$model->id_bilancio)),
	array('label'=>'Delete Bilancio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bilancio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bilancio', 'url'=>array('admin')),
);
?>

<h1>View Bilancio #<?php echo $model->id_bilancio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bilancio',
		'anno',
		'voce',
		'valore',
	),
)); ?>
