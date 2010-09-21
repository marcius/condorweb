<?php
$this->breadcrumbs=array(
	'Condomini', 'Riepilogo quote'
);

$this->menu=array(
    array('label'=>'Tabelle millesimali', 'url'=>array('millesimi')),
    array('label'=>'Dettaglio quote', 'url'=>array('dettaglioQuote')),
	array('label'=>'Riepilogo quote', 'url'=>array('riepilogoQuote')),
);
?>

<?php echo CHtml::beginForm(array('condomini/riepilogoQuote')); ?>

    <?php echo CHtml::errorSummary($searchModel); ?>
    <div class="row">
        <div class="column">
            <?php echo CHtml::activeLabelEx($searchModel,'anno'); ?>
            <?php echo CHtml::activeDropDownList($searchModel,'anno',
                array('2007'=>'2007', '2008'=>'2008', '2009'=>'2009', '2010'=>'2010'),
                array('prompt'=>' ')
                ); ?>
            <?php echo CHtml::error($searchModel,'anno'); ?>
        </div>
    </div>

    <div class="row">
        <div class="column">
        <?php echo CHtml::submitButton('Visualizza'); ?>
        </div>
    </div>

<?php echo CHtml::endForm(); ?>

<br/>
<br/>

<h1>Riepilogo quote <?php echo $searchModel->anno; ?></h1>

<!--p><?php print_r($bilancio["cassa"]); ?></p-->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'placeholders-values',
       'dataProvider'=>$dpRiepQuote,
       'columns'=>array(
            'nome',
            'arretrati',
            'correnti',
            'pagati',
            'da_pagare',
    ),
)); ?>

