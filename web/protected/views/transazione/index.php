<?php
$this->breadcrumbs=array(
	'Transaziones',
);

$this->menu=array(
	array('label'=>'Create Transazione', 'url'=>array('create')),
	array('label'=>'Manage Transazione', 'url'=>array('admin')),
);
?>

<h1>Transaziones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
