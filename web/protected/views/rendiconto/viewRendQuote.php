<?php
$this->breadcrumbs = array(
    'Rendiconto',
);
?>

<h1>Rendiconto anno <?php echo $searchModel->anno; ?></h1>

<h2>Riepilogo quote condominiali</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'riepquote-grid',
    'dataProvider' => $dpRiepQuote,
    'columns' => array(
        'nome:text:Nome',
        array(
            'name' => 'Saldo dovuto anni precedenti',
            'value' => 'U::num_d2($data["saldo_prec"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Quote anno corrente',
            'value' => 'U::num_d2($data["tot_quote_corr"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Quote versate anno corrente',
            'value' => 'U::num_d2($data["tot_versamenti_corr"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Saldo da versare',
            'value' => 'U::num_d2($data["saldo_tot"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
    ),
)); ?>

<h2>Dettaglio versamenti effettuati</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'versamenti-grid',
    'dataProvider' => $dpPagamentiQuote,
    'columns' => array(
        'data_pagam:text:Data',
        'transazione.controparte.nome:text:Condòmino',
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