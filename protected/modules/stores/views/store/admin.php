<?php
/* @var $this StoreController */
/* @var $model Store */

$this->breadcrumbs=array(
	'Stores'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Store', 'url'=>array('index')),
	array('label'=>'Create Store', 'url'=>array('create')),
);
?>

<h1>Manage Stores</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'store-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'application_id',
		'created',
		'updated',
		'count',
		'type_id',
		/*
		'note',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
