<?php

class MainMenu {

    public static function getItemsArchivi() {
        return array(
            array('label' => 'Nuova transazione', 'url' => array('/transazione/create')),
            array('label' => 'Transazioni', 'url' => array('/transazione/admin', 'Transazione[anno_registrazione]'=> Yii::app()->session['anno'])),
            array('label' => 'Soggetti', 'url' => array('/soggetto/admin')),
            array('label' => 'Tabelle millesimali', 'url' => array('/archivi/index')),
            array('label' => 'Conti', 'url' => array('/archivi/index')),
        );
    }

    public static function getItemsRendiconto() {
        return array(
            array('label' => 'Cassa', 'url' => array('/rendiconto/viewRendCassa', 'anno' => Yii::app()->session['anno'])),
            array('label' => 'Quote condominiali', 'url' => array('/rendiconto/viewRendQuote', 'anno' => Yii::app()->session['anno'])),
            array('label' => 'Spese per cassa', 'url' => array('/rendiconto/viewRendSpeseCassa', 'anno' => Yii::app()->session['anno'])),
            array('label' => 'Spese per competenza', 'url' => array('/rendiconto/viewRendSpeseComp', 'anno' => Yii::app()->session['anno'])),
        );
    }

    public static function getItemsProcedure() {
        return array(
            array('label' => 'Calcola consuntivo', 'url' => array('/bilCalc/calcConsAnno', 'anno' => Yii::app()->session['anno'])),
        //array('label'=>'Calcola quote', 'url'=>array('/bilancio/calcQuote', 'anno'=>Yii::app()->session['anno'])),
            array('label' => 'Quadratura', 'url' => array('/bilCalc/visualizza', 'anno' => Yii::app()->session['anno'])),
            array('label' => 'Fornitori Quadro AC', 'url' => array('/bilCalc/viewFornitoriAC', 'anno' => Yii::app()->session['anno'])),
        //array('label'=>'Gestione preventivo', 'url'=>array('/bilancio/gestPrevAnno', 'anno'=>Yii::app()->session['anno'])),
        );
    }

    public static function getItemsAnnoLavoro() {
        return array(
            array('label' => '2010', 'url' => array('/settings/selanno', 'anno' => '2010')),
            array('label' => '2009', 'url' => array('/settings/selanno', 'anno' => '2009')),
            array('label' => '2008', 'url' => array('/settings/selanno', 'anno' => '2008')),
            //array('label' => 'ante 2008', 'url' => array('/settings/selanno', 'anno' => '2007')),
        );
    }

    public static function getItemsProfilo() {
        return array(
            array('label' => 'Visualizza', 'url' => Yii::app()->getModule('user')->profileUrl),
            array('label' => 'Cambia password', 'url' => array('/user/profile/changepassword')),
        );
    }

    public static function getItems() {
        $g = Yii::app()->user->isGuest;
        $a = Yii::app()->user->checkAccess('admin', array(), true);
        $menu = array(
            array('label' => 'Home', 'url' => array('/site/index')),
            // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
            // array('label'=>'Contact', 'url'=>array('/site/contact')),
            array('label' => 'Archivi', 'visible' => $a, 'items' => MainMenu::getItemsArchivi()),
            array('label' => 'Rendiconto', 'visible' => !$g, 'items' => MainMenu::getItemsRendiconto()),
            array('label' => 'Procedure', 'visible' => $a, 'items' => MainMenu::getItemsProcedure()),
            array('label' => 'Anno di lavoro (' . Yii::app()->session['anno'] . ')', 'visible' => !$g, 'items' => MainMenu::getItemsAnnoLavoro()),
            array('label' => Yii::app()->getModule('user')->t("Register"), 'visible' => $g, 'url' => Yii::app()->getModule('user')->registrationUrl),
            array('label' => Yii::app()->getModule('user')->t("Login"), 'visible' => $g, 'url' => Yii::app()->getModule('user')->loginUrl),
            array('label' => Yii::app()->getModule('user')->t("Profile"), 'visible' => !$g, 'items' => MainMenu::getItemsProfilo()),
            array('label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'visible' => !$g, 'url' => Yii::app()->getModule('user')->logoutUrl),
        );
        return $menu;
    }

}

?>
