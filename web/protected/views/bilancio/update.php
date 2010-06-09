<?php
$this->breadcrumbs=array(
	'Bilancios'=>array('index'),
	$model->id_bilancio=>array('view','id'=>$model->id_bilancio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bilancio', 'url'=>array('index')),
	array('label'=>'Create Bilancio', 'url'=>array('create')),
	array('label'=>'View Bilancio', 'url'=>array('view', 'id'=>$model->id_bilancio)),
	array('label'=>'Manage Bilancio', 'url'=>array('admin')),
);
?>

<h1>Update Bilancio <?php echo $model->id_bilancio; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>