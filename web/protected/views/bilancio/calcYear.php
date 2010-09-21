<?php
$this->breadcrumbs=array(
	'Bilancio', 'Crea'
);

$this->menu=SubMenu::bilancio();

?>

<?php echo CHtml::beginForm(array('bilancio/calcYear')); ?>

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
        <?php echo CHtml::submitButton('Crea'); ?>
        </div>
    </div>

<?php echo CHtml::endForm(); ?>


