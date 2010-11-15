<?php

class RendicontoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array(),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('viewRendCassa', 'viewRendQuote', 'viewRendSpeseCassa', 'viewRendSpeseComp'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionViewRendQuote() {
        $searchModel = new CommonSearch();
        if (isset(Yii::app()->session['anno'])) {
            $searchModel->anno = Yii::app()->session['anno'];
        } else {
            $searchModel->anno = "2007";
        }

        if ($searchModel->validate()) {
            $stmt = BilCalcSQLHelper::createStmt_GetRiepQuote($searchModel->anno);
            $config = array('pagination' => false);
            $dpRiepQuote = new CSqlDataProvider($stmt, $config);
            $dpPagamentiQuote = Pagamento::searchQuotePerAnno($searchModel->anno);
            $this->render('viewRendQuote', array(
                'searchModel' => $searchModel,
                'dpRiepQuote' => $dpRiepQuote,
                'dpPagamentiQuote' => $dpPagamentiQuote,
                    )
            );
        } else {
            $this->render('index', array());
        }
    }

    public function actionViewRendCassa() {
        $searchModel = new CommonSearch();
        if (isset(Yii::app()->session['anno'])) {
            $searchModel->anno = Yii::app()->session['anno'];
        } else {
            $searchModel->anno = "2007";
        }

        if ($searchModel->validate()) {
            $stmt = BilCalcSQLHelper::createStmt_GetRiepCassa($searchModel->anno);
            $config = array();
            $dpRiepCassa = new CSqlDataProvider($stmt, $config);
            $dpPagamentiQuote = Pagamento::searchPerAnno($searchModel->anno);
            $this->render('viewRendCassa', array(
                'searchModel' => $searchModel,
                'dpRiepCassa' => $dpRiepCassa,
                'dpPagamentiQuote' => $dpPagamentiQuote,
            ));
        } else {
            $this->render('index', array());
        }
    }

    public function actionViewRendSpeseCassa() {
        $model = new TransazioneEx();
        $model->tipo_transazione = "U";
        if (isset(Yii::app()->session['anno'])) {
            $model->anno_registrazione = Yii::app()->session['anno'];
        } else {
            $model->anno_registrazione = "2007";
        }

        if ($model->validate()) {
            $titolo = 'Rendiconto per cassa ' . $model->anno_registrazione;
            $dpRiepTransazioniPerCausale = $model->pr_cassa()->search();
            $stmt = BilCalcSQLHelper::createStmt_GetRiepSpese($model->anno_registrazione);
            $dpRiepSpese = new CSqlDataProvider($stmt, array('pagination' => false));
            $this->render('viewRendSpese', array(
                'model' => $model,
                'titolo' => $titolo,
                'dpRiepSpese' => $dpRiepSpese,
                'dpRiepTransazioniPerCausale' => $dpRiepTransazioniPerCausale,
                    )
            );
        } else {
            $this->redirect('/');
        }
    }

    public function actionViewRendSpeseComp() {
        $model = new TransazioneEx();
        $model->tipo_transazione = "U";
        if (isset(Yii::app()->session['anno'])) {
            $model->anno_registrazione = Yii::app()->session['anno'];
        } else {
            $model->anno_registrazione = "2007";
        }

        if ($model->validate()) {
            $titolo = 'Rendiconto per competenza ' . $model->anno_registrazione;
            $stmt = BilCalcSQLHelper::createStmt_GetRiepCausali($model->anno_registrazione, "U");
            $dpRiepSpese = new CSqlDataProvider($stmt, array('pagination' => false));
            $dpRiepTransazioniPerCausale = $model->pr_comp()->search();
            $this->render('viewRendSpese', array(
                'model' => $model,
                'titolo' => $titolo,
                'dpRiepSpese' => $dpRiepSpese,
                'dpRiepTransazioniPerCausale' => $dpRiepTransazioniPerCausale,
                    )
            );
        } else {
            $this->redirect('/');
        }
    }

}
