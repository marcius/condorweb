<?php
$this->breadcrumbs=array(
	'Bilancios',
);

$this->menu=array(
    array('label'=>'Visualizza bilancio 2009', 'url'=>array('viewYear')),
	array('label'=>'Crea bilancio 2009', 'url'=>array('createBilancio')),
	array('label'=>'Manage Bilancio', 'url'=>array('admin')),
);
?>

<h1>Bilancios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
