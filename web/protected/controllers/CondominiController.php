<?php

class CondominiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to 'column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='application.views.layouts.column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'millesimi', 'dettaglioQuote', 'riepilogoQuote'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index',array(
		));
	}

    public function actionRiepilogoQuote()
    {
        $searchModel=new CommonSearch();
        if(isset($_POST['CommonSearch'])) {
            $searchModel->attributes=$_POST['CommonSearch'];
        } else {
            $searchModel->anno = "2009";
        }

        if($searchModel->validate())
        {
            $dpRiepQuote = CondominiHelper::getDpRiepQuote($searchModel->anno);
            $this->render('riepilogoQuote', array(
                    'searchModel'=>$searchModel,
                    'dpRiepQuote'=>$dpRiepQuote,
                    )
            );
        } else {
		$this->render('index',array());
        }
    }
}
