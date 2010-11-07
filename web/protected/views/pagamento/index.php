<?php
$this->breadcrumbs=array(
	'Pagamentos',
);

$this->menu=array(
	array('label'=>'Create Pagamento', 'url'=>array('create')),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>Pagamentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
