<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Заказы'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список заказов', 'url'=>array('index')),
	array('label'=>'Создать заказ', 'url'=>array('create')),
	array('label'=>'Редактировать заказ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить заказ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление заказами', 'url'=>array('admin')),
);
?>

<h1>Просмотр заказа #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
	),
)); ?>
