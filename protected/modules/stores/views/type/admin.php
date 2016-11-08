<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
);

?>

<h1>Manage Types</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'status_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
