<?php
$this->breadcrumbs=array(
	'Soggettos',
);

$this->menu=array(
	array('label'=>'Create Soggetto', 'url'=>array('create')),
	array('label'=>'Manage Soggetto', 'url'=>array('admin')),
);
?>

<h1>Soggettos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
