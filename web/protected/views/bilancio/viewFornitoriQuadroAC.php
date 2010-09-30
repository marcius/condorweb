<?php
$this->breadcrumbs=array(
    'Bilancio',
);

$this->menu=SubMenu::bilancio();

?>

<h1>Bilancio <?php echo $searchModel->anno; ?></h1>

<h2>Riepilogo fornitori per Quadro AC</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'placeholders-values',
        'dataProvider'=>$dpFornitoriQuadroAC,
        'columns'=>array(
            'nome:text:Fornitore',
            'importo:number:Importo',
    ),
)); ?>
