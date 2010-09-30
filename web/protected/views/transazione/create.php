<?php
$this->breadcrumbs=array(
	'Transaziones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Transazione', 'url'=>array('index')),
	array('label'=>'Manage Transazione', 'url'=>array('admin')),
);
?>

<h1>Create Transazione</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>