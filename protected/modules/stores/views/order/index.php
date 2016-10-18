<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Заказы',
);

$this->menu=array(
	array('label'=>'Создать заказ', 'url'=>array('create')),
	array('label'=>'Управление заказами', 'url'=>array('admin')),
);
?>

<h1>Популярные заказы</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
