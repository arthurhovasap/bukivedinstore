<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html ng-app="App">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "screen.css"); ?>" media="screen, projection">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "print.css"); ?>" media="print">-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "main.css"); ?>">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "form.css"); ?>">-->
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "jquery-1.9.1.min.js"), CClientScript::POS_HEAD);?>
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "jquery-ui.min.js"), CClientScript::POS_HEAD);?>
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "jquery-migrate-1.2.1.min.js"), CClientScript::POS_HEAD);?>
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "angular.min.js"), CClientScript::POS_HEAD);?>
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "main.js"), CClientScript::POS_HEAD);?>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo app::baseUrl(false, "/bootstrap/css/", "bootstrap.min.css"); ?>" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="<?php echo app::baseUrl(false, "/bootstrap/css/", "bootstrap-theme.min.css"); ?>" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/bootstrap/js/", "bootstrap.min.js"), CClientScript::POS_HEAD);?>
        
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

    <div class="container-fluid" id="page" ng-controller="AppCtrl">
        <div class="row">
            
        </div>
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
