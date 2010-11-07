<?php
$this->breadcrumbs = array(
    'Rendiconto',
);
?>

<h1><?php echo $titolo; ?></h1>


<h2>Raffronto preventivo e consuntivo spese</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'riepspese-grid',
    'dataProvider' => $dpRiepSpese,
    'columns' => array(
        'descrizione:text:Causale',
        array(
            'name' => 'Preventivo',
            'value' => 'U::num_d2($data["preventivo"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Consuntivo',
            'value' => 'U::num_d2($data["consuntivo"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'Saldo',
            'value' => 'U::num_d2($data["saldo"])',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
    ),
)); ?>

<h2>Dettaglio spese</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'transazioneex-grid',
    'dataProvider' => $dpRiepTransazioniPerCausale,
    'columns' => array(
        //'id_transazione',
        //'tipo_transazione',
        //'rowtype',
        array(
            'name' => 'descrizione',
            'value' => '($data->rowtype=="D" ? ".....".$data->descrizione : $data->causale->descrizione)',
            'type' => 'text',
        ),
        array(
            'name' => 'importo',
            'value' => 'U::num_d2($data->importo)',
            'type' => 'text',
            'cssClassExpression' => '"al-right"',
        ),
        array(
            'name' => 'controparte',
            'value' => '$data->controparte->nome',
            'type' => 'text',
        ),
        'data_doc',
        'riferim_doc',
        'data_pagam',
        'des_pagam',
        array(
            'name' => 'cassa',
            'value' => '$data->cassa->descrizione',
            'type' => 'text',
        ),
    //array(
    //	'class'=>'CButtonColumn',
    //),
    ),
)); ?>
