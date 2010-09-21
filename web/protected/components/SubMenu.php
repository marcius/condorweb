<?php
class SubMenu
{
    public static function bilancio(){
        return array(
            array('label'=>'Visualizza', 'url'=>array('visualizza')),
            array('label'=>'Calcola consuntivo', 'url'=>array('calcConsAnno')),
            array('label'=>'Calcola quote', 'url'=>array('calcQuote')),
            array('label'=>'Gestione preventivo', 'url'=>array('gestPrevAnno')),
            array('label'=>'Seleziona anno di lavoro', 'url'=>array('/settings/selanno')),
        );
    }

    public static function settings(){
        return array(
            array('label'=>'Seleziona anno di lavoro', 'url'=>array('selanno')),
            array('label'=>'---', 'url'=>array('calcYear')),
        );
    }

    public static function condomini(){
        return array(
            array('label'=>'Seleziona anno di lavoro', 'url'=>array('selanno')),
            array('label'=>'---', 'url'=>array('calcYear')),
        );
    }

}
?>
