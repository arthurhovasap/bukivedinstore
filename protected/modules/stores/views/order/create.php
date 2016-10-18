<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Заказы'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список заказов', 'url'=>array('index')),
	array('label'=>'Управление заказами', 'url'=>array('admin')),
);
?>

<h1>Создать заказ</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>