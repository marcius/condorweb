<?php

class SettingsController extends Controller
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
				'actions'=>array('index', 'selanno'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
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

    public function actionSelanno2()
    {
        $session = Yii::app()->session;
        if(isset($_GET['anno'])) {
            $newanno=$_GET['anno'];
            $session['anno'] = $newanno;
        } else {
            $this->render('view',array());
        }
            $this->render('view',array());
    }

    	public function actionSelanno()
	{
        $session = Yii::app()->session;
        if(isset($_GET['anno'])) {
            $newanno=$_GET['anno'];
            $session['anno'] = $newanno;
            $this->redirect(Yii::app()->user->returnUrl);
            //$this->render('view',array());
        } else {
            $dpBilanci = BilancioHelper::getDpBilanci();
            $this->render('selanno', array(
                    'dpBilanci'=>$dpBilanci,
                    )
            );
        }
	}
}
