<?php
$this->breadcrumbs=array(
	'Transaziones'=>array('index'),
	$model->id_transazione=>array('view','id'=>$model->id_transazione),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transazione', 'url'=>array('index')),
	array('label'=>'Create Transazione', 'url'=>array('create')),
	array('label'=>'View Transazione', 'url'=>array('view', 'id'=>$model->id_transazione)),
	array('label'=>'Manage Transazione', 'url'=>array('admin')),
);
?>

<h1>Update Transazione <?php echo $model->id_transazione; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>