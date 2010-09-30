<?php
$this->breadcrumbs=array(
	'Soggettos'=>array('index'),
	$model->id_controparte=>array('view','id'=>$model->id_controparte),
	'Update',
);

$this->menu=array(
	array('label'=>'List Soggetto', 'url'=>array('index')),
	array('label'=>'Create Soggetto', 'url'=>array('create')),
	array('label'=>'View Soggetto', 'url'=>array('view', 'id'=>$model->id_controparte)),
	array('label'=>'Manage Soggetto', 'url'=>array('admin')),
);
?>

<h1>Update Soggetto <?php echo $model->id_controparte; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>