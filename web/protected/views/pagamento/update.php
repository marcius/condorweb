<?php
$this->breadcrumbs=array(
	'Pagamentos'=>array('index'),
	$model->id_pagamento=>array('view','id'=>$model->id_pagamento),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pagamento', 'url'=>array('index')),
	array('label'=>'Create Pagamento', 'url'=>array('create')),
	array('label'=>'View Pagamento', 'url'=>array('view', 'id'=>$model->id_pagamento)),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>Update Pagamento <?php echo $model->id_pagamento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>