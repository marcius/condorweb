<?php

class BilCalcController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to 'column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'application.views.layouts.column1';
    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

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
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('visualizza'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'calcConsAnno', 'calcQuote', 'gestPrevAnno', 'viewFornitoriAC'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Bilancio;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bilancio'])) {
            $model->attributes = $_POST['Bilancio'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_bilancio));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bilancio'])) {
            $model->attributes = $_POST['Bilancio'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_bilancio));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dpBilanci = BilCalcHelper::getDpBilanci();
        $this->render('index', array(
            'dpBilanci' => $dpBilanci,
                )
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Bilancio('search');
        if (isset($_GET['Bilancio']))
            $model->attributes = $_GET['Bilancio'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Bilancio::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bilancio-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionVisualizza() {
        $searchModel = new CommonSearch();
        //if(isset($_GET['CommonSearch'])) {
        if (isset(Yii::app()->session['anno'])) {
            //$searchModel->attributes=$_GET['CommonSearch'];
            $searchModel->anno = Yii::app()->session['anno'];
        } else {
            $searchModel->anno = "2007";
        }

        if ($searchModel->validate()) {
            $bilancio = BilCalcHelper::creaArrayPerView($searchModel->anno);
            $dpRiepCausali = BilCalcHelper::getDpRiepCausali($searchModel->anno);
            //Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/grid.css', 'all');
            $this->render('viewYear', array(
                'searchModel' => $searchModel,
                'bilancio' => $bilancio,
                'dpRiepCausali' => $dpRiepCausali,
                    )
            );
        } else {
            $this->render('index', array());
        }
    }

    public function actionCalcConsAnno() {
        $searchModel = new CommonSearch();
        if (!isset($_POST['CommonSearch'])) {
            $searchModel->anno = "2009";
            $this->render('calcYear', array(
                'searchModel' => $searchModel,
                    )
            );
        } else {
            $searchModel->attributes = $_POST['CommonSearch'];
            if ($searchModel->validate()) {
                BilCalcHelper::creaBilancio($searchModel->anno);
                $bilancio = BilCalcHelper::creaArrayPerView($searchModel->anno);
                $dpRiepCausali = BilCalcHelper::getDpRiepCausali($searchModel->anno);
                $this->render('viewYear', array(
                    'searchModel' => $searchModel,
                    'bilancio' => $bilancio,
                    'dpRiepCausali' => $dpRiepCausali,
                        )
                );
            } else {
                $this->redirect('/');
            }
        }
    }

    public function actionCalcQuote() {
        $searchModel = new CommonSearch();
        if (!isset($_POST['CommonSearch'])) {
            $searchModel->anno = "2009";
            $this->render('calcYear', array(
                'searchModel' => $searchModel,
                    )
            );
        } else {
            $searchModel->attributes = $_POST['CommonSearch'];
            if ($searchModel->validate()) {
                CondominiHelper::calcQuote($searchModel->anno);
                $dpRiepCausali = BilCalcHelper::getDpRiepCausali($searchModel->anno);
                $this->render('viewYear', array(
                    'searchModel' => $searchModel,
                    'bilancio' => $bilancio,
                    'dpRiepCausali' => $dpRiepCausali,
                        )
                );
            } else {
                $this->render('index', array());
            }
        }
    }

    public function actionViewFornitoriAC() {
        $searchModel = new CommonSearch();
        if (isset(Yii::app()->session['anno'])) {
            $searchModel->anno = Yii::app()->session['anno'];
        } else {
            $searchModel->anno = "2007";
        }

        if ($searchModel->validate()) {
            $dpFornitoriQuadroAC = BilCalcHelper::getDpFornitoriQuadroAC($searchModel->anno);
            $this->render('viewFornitoriQuadroAC', array(
                'searchModel' => $searchModel,
                'dpFornitoriQuadroAC' => $dpFornitoriQuadroAC,
                    )
            );
        } else {
            $this->render('index', array());
        }
    }


}
