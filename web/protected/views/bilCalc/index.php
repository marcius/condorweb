<?php
$this->breadcrumbs=array(
	'Bilancio',
);

$this->menu=SubMenu::bilancio();

?>

<h1>Gestione bilanci</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bilancio-grid',
	'dataProvider'=>$dpBilanci,
	//'filter'=>$model,
	'columns'=>array(
		'anno_registrazione:text:Anno',
		'num_transazioni:text:Numero transazioni',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{VisBil} {CalcQuote} {GestPrev} {CalcCons}',
            'header'=>'Azioni',
            'htmlOptions'=>array('class'=>''),
            'headerHtmlOptions'=>array('class'=>''), 
            'buttons'=>array(
                'GestPrev' => array(
                    'label'=>'Gestione preventivo',     // text label of the button
                    'url'=>'Yii::app()->createUrl("bilancio/gestPrevAnno",array("anno"=>$data->anno_registrazione))',       // a PHP expression for generating the URL of the button
                    //'imageUrl'=>'false',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(''), // HTML options for the button tag
                    //'click'=>'',     // a JS function to be invoked when the button is clicked
                    'visible'=>'1==1',   // a PHP expression for determining whether the button is visible
                ),
                'CalcQuote' => array(
                    'label'=>'Calcola quote',     // text label of the button
                    'url'=>'Yii::app()->createUrl("bilancio/calcQuote",array("anno"=>$data->anno_registrazione))',       // a PHP expression for generating the URL of the button
                    //'imageUrl'=>'false',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(''), // HTML options for the button tag
                    //'click'=>'',     // a JS function to be invoked when the button is clicked
                    'visible'=>'1==1',   // a PHP expression for determining whether the button is visible
                ),
                'CalcCons' => array(
                    'label'=>'Elabora consuntivo',     // text label of the button
                    'url'=>'Yii::app()->createUrl("bilancio/calcConsAnno",array("anno"=>$data->anno_registrazione))',       // a PHP expression for generating the URL of the button
                    //'imageUrl'=>'false',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(''), // HTML options for the button tag
                    //'click'=>'',     // a JS function to be invoked when the button is clicked
                    'visible'=>'1==1',   // a PHP expression for determining whether the button is visible
                ),
                'VisBil' => array(
                    'label'=>'Visualizza',     // text label of the button
                    'url'=>'Yii::app()->createUrl("bilancio/visualizza")',       // a PHP expression for generating the URL of the button
                    //'url'=>'Yii::app()->createUrl("bilancio/visualizza",array("anno"=>$data->anno_registrazione))',       // a PHP expression for generating the URL of the button
                    //'imageUrl'=>'false',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(''), // HTML options for the button tag
                    //'click'=>'',     // a JS function to be invoked when the button is clicked
                    'visible'=>'1==1',   // a PHP expression for determining whether the button is visible
                ),
            ),
        ),
	),
)); ?>