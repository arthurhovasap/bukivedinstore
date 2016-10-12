<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="ru">
<link rel="icon" type="image/png" href="<?php echo app::baseUrl(false, "/images/", "favicon.png"); ?>" />
<!-- blueprint CSS framework -->
<!--<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "screen.css"); ?>" media="screen, projection">-->
<!--<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "print.css"); ?>" media="print">-->
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "main.css"); ?>">
<!--<link rel="stylesheet" type="text/css" href="<?php echo app::baseUrl(false, "/css/", "form.css"); ?>">-->
<?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "jquery-1.9.1.min.js"), CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php
$cs = Yii::app()->clientScript;
$cs->coreScriptPosition = $cs::POS_END;

$cs->scriptMap = array(
    'jquery.js' => false,
    'jquery.ui.js' => false,
);
?>

<?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "jquery-ui.min.js"), CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "jquery-migrate-1.2.1.min.js"), CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "angular.min.js"), CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/js/", "main.js"), CClientScript::POS_HEAD); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo app::baseUrl(false, "/bootstrap/css/", "bootstrap.min.css"); ?>" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo app::baseUrl(false, "/bootstrap/css/", "bootstrap-theme.min.css"); ?>" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<?php Yii::app()->clientScript->registerScriptFile(app::baseUrl(false, "/bootstrap/js/", "bootstrap.min.js"), CClientScript::POS_HEAD); ?>