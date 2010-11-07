<?php
$this->breadcrumbs=array(
	'Pagamentos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pagamento', 'url'=>array('index')),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>Create Pagamento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>