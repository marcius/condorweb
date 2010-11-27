<?php
$this->breadcrumbs = array(
    'Rendiconto',
);
?>

<h1><?php echo $titolo; ?></h1>


<h2>Riepilogo cassa</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'riepcassa-grid',
    'dataProvider' => $dpRiepCassa,
    'columns' => array(
        'descrizione:text:Descrizione',
        array(
            'name' => 'Banca',
            'value' => 'U::num_d2($data["banca"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Contanti',
            'value' => 'U::num_d2($data["contanti"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Totale',
            'value' => 'U::num_d2($data["totale"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
    ),
)); ?>

<h2>Dettaglio movimenti effettuati</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'versamenti-grid',
    'dataProvider' => $dpPagamentiQuote,
    'columns' => array(
        'data_pagam:text:Data',
        'transazione.descrizione:text:Descrizione',
        'transazione.controparte.nome:text:Controparte',
        array(
            'name' => 'Importo',
            'value' => 'U::num_d2($data->importo)',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        'cassa.descrizione:text:Cassa',
        'des_pagam:text:Note',
        array(
            'class'=>'CLinkColumn',
            'header'=>'ID',
            'labelExpression'=>'$data->id_transazione',
            'urlExpression'=>'Yii::app()->createUrl("transazione/view",array("id"=>$data->id_transazione))',
            'linkHtmlOptions'=>array('target'=>'_blank', 'title'=>'Visualizza transazione'),
            'visible'=>Yii::app()->user->checkAccess('admin', array(), true),
        ),
    ),
)); ?>