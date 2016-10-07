<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html ng-app="App">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "screen.css"); ?>" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "print.css"); ?>" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "main.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "form.css"); ?>">

        <?php echo CGoogleApi::init(); ?>
        <?php echo CHtml::script(
            CGoogleApi::load('jquery') . "\n" .
            CGoogleApi::load("jqueryui")
        ); ?>
        
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "angular.min.js"), CClientScript::POS_HEAD);?>
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "main.js"), CClientScript::POS_HEAD);?>
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <script>
            var app = angular.module('App', []);
            app.controller('AppCtrl', function($scope) {
                $scope.count = 0;
                $scope.myFunction = function() {
                    alert("777");
                }
            });
        </script>
</head>

<body>

    <div class="container" id="page" ng-controller="AppCtrl">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
