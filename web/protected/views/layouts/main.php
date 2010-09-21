<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="print, screen, projection" />
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenumb">
		<?php //$this->widget('zii.widgets.CMenu',array(
                      $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				// array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				// array('label'=>'Contact', 'url'=>array('/site/contact')),
                                array('label'=>'Archivi', 'url'=>array('/archivi/index'), 'items'=>array(
                                    array('label'=>'Soggetti', 'url'=>array('/condomini/index')),
                                    array('label'=>'Tabelle millesimali', 'url'=>array('bilancio/calcQuote')),
                                    array('label'=>'Conti', 'url'=>array('bilancio/calcConsAnno')),
                                    )),
                                array('label'=>'Bilancio', 'url'=>array('/bilancio/index'), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                    array('label'=>'Gestione preventivo', 'url'=>array('bilancio/gestPrevAnno', 'anno'=>Yii::app()->session['anno'])),
                                    array('label'=>'Calcola quote', 'url'=>array('bilancio/calcQuote', 'anno'=>Yii::app()->session['anno'])),
                                    array('label'=>'Calcola consuntivo', 'url'=>array('bilancio/calcConsAnno', 'anno'=>Yii::app()->session['anno'])),
                                    array('label'=>'Visualizza', 'url'=>array('bilancio/visualizza', 'anno'=>Yii::app()->session['anno'])),
                                    )),
                                array('label'=>'Anno di lavoro (' . Yii::app()->session['anno'].')', 'url'=>array('settings/selanno'), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                    array('label'=>'2010', 'url'=>array('settings/selanno', 'anno'=>'2010')),
                                    array('label'=>'2009', 'url'=>array('settings/selanno', 'anno'=>'2009')),
                                    array('label'=>'2008', 'url'=>array('settings/selanno', 'anno'=>'2008')),
                                    array('label'=>'ante 2008', 'url'=>array('settings/selanno', 'anno'=>'2007')),
                                    )),
                                //array('label'=>Yii::app()->session['anno']),
                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Condominio di via Villoresi 24 interno<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>