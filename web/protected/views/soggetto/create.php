<?php
$this->breadcrumbs=array(
	'Soggettos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Soggetto', 'url'=>array('index')),
	array('label'=>'Manage Soggetto', 'url'=>array('admin')),
);
?>

<h1>Create Soggetto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>