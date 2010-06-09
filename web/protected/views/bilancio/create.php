<?php
$this->breadcrumbs=array(
	'Bilancios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bilancio', 'url'=>array('index')),
	array('label'=>'Manage Bilancio', 'url'=>array('admin')),
);
?>

<h1>Create Bilancio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>