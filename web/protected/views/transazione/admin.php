<?php
$this->breadcrumbs=array(
	'Transaziones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Transazione', 'url'=>array('index')),
	array('label'=>'Create Transazione', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transazione-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Transaziones</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php /*echo print_r(CHtml::listData(Soggetto::model()->findAll(),'id_controparte','nome')); */?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transazione-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_transazione',
		'tipo_transazione',
		'anno_registrazione',
		'anno_competenza',
                array(
                    'name'=>'causale',
                    'value'=>'$data->causale->descrizione',
                    'filter'=>CHtml::listData(Causale::model()->findAll(),'id_causale','descrizione'),
                    'type'=>'text',
                    ),
                array(
                    'name'=>'controparte',
                    'value'=>'$data->controparte->nome',
                    'filter'=>CHtml::listData(Soggetto::model()->ordinati()->findAll(),'id_controparte','nome'),
                    'type'=>'text',
                    ),
		'descrizione',
		'importo',
                array(
                    'name'=>'cassa',
                    'value'=>'$data->cassa->descrizione',
                    'filter'=>CHtml::listData(Cassa::model()->findAll(),'id_cassa','descrizione'),
                    'type'=>'text',
                    ),
		'data_doc',
		'riferim_doc',
		'data_pagam',
		'des_pagam',
		array(
			'class'=>'CButtonColumn',
		),
	),
    /*
        'pager'=>array(
                'class'=>'CLinkPager',
                'pageSize'=>'100',
            ),
     *
     */
)); ?>
