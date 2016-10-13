<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Ошибка';
$this->breadcrumbs=array(
	'Ошибка',
);
?>

<h2 class="text-danger">Ошибка <?php echo $code; ?></h2>

<div class="bg-danger">
<?php echo CHtml::encode($message); ?>
</div>