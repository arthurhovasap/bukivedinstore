<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Заказы'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список заказов', 'url'=>array('index')),
	array('label'=>'Создать заказ', 'url'=>array('create')),
	array('label'=>'Просмотр заказов', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление заказами', 'url'=>array('admin')),
);
?>

<h1>Редактировать заказ <?php echo $model->id; ?></h1>