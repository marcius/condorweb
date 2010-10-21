<?php
$this->breadcrumbs=array(
    'Bilancio',
);

?>

<h1>Bilancio <?php echo $searchModel->anno; ?></h1>

<h2>Riepilogo transazioni per causale</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'transazioneex-grid',
        'dataProvider'=>$dpRiepTransazioniPerCausale,
	'columns'=>array(
		//'id_transazione',
		//'tipo_transazione',
		//'anno_registrazione',
                array(
                    'name'=>'descrizione',
                    'value'=>'($data->rowtype=="D" ? $data->descrizione : "TOTALE ".$data->causale->descrizione)',
                    'type'=>'text',
                    ),
		'importo',
                array(
                    'name'=>'controparte',
                    'value'=>'$data->controparte->nome',
                    'filter'=>CHtml::listData(Soggetto::model()->ordinati()->findAll(),'id_controparte','nome'),
                    'type'=>'text',
                    ),
		'data_doc',
		'riferim_doc',
		'data_pagam',
		'des_pagam',
                array(
                    'name'=>'cassa',
                    'value'=>'$data->cassa->descrizione',
                    'filter'=>CHtml::listData(Cassa::model()->findAll(),'id_cassa','descrizione'),
                    'type'=>'text',
                    ),
		//array(
		//	'class'=>'CButtonColumn',
		//),
	),
       /* 'columns'=>array(
            'tipo_transazione:text:tipo_transazione',
            'id_causale:text:id_causale',
            'id_cassa:text:id_cassa',
            'id_controparte:text:id_controparte',
            'descrizione:text:descrizione',
            'importo:number:Importo',
    ),*/
)); ?>
