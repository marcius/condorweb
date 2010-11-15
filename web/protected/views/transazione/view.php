<?php
$this->breadcrumbs = array(
    'Transazioni' => array('index'),
    $model->id_transazione,
);

$this->menu = array(
    array('label' => 'List Transazione', 'url' => array('index')),
    array('label' => 'Create Transazione', 'url' => array('create')),
    array('label' => 'Update Transazione', 'url' => array('update', 'id' => $model->id_transazione)),
    array('label' => 'Delete Transazione', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_transazione), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Transazione', 'url' => array('admin')),
    array('label' => 'Nuovo pagamento', 'url' => array('pagamento/create','id_transazione'=>$model->id_transazione)),
);
?>

<h1>View Transazione #<?php echo $model->id_transazione; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id_transazione',
        'tipo_transazione',
        'anno_registrazione',
        'anno_competenza',
        'causale.descrizione',
        'controparte.nome',
        'descrizione',
        'importo',
        'data_doc',
        'riferim_doc',
    ),
));


$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pagamenti-grid',
    'dataProvider' => $dpPagamenti,
    'columns' => array(
        'id_pagamento',
        'data_pagam',
        'importo',
        'cassa.descrizione',
        'des_pagam',
        /*
          'id_pagamento',
         */
        array(
            'class' => 'CButtonColumn',
            'viewButtonUrl' => 'Yii::app()->createUrl("pagamento/view",array("id"=>$data->primaryKey))',
            'updateButtonUrl' => 'Yii::app()->createUrl("pagamento/update",array("id"=>$data->primaryKey))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("pagamento/delete",array("id"=>$data->primaryKey))',
        ),
    ),
)); ?>
