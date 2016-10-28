<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'Список заявок', 'url'=>array('index')),
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Обновить заявку', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить заявку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управлять заявками', 'url'=>array('admin')),
);
?>

<h1>Детали заказа #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
                    'label' => $model->getAttributeLabel('code'),
                    'type' => 'raw',
                    'value' => ($model->code != NULL) ? CHtml::link($model->zakaz->nomer, array('code', 'id'=>$model->code)) : "",
                    'visible'=> ($model->code != NULL) ? true : false,
                ),
                array(
                    'label' => $model->getAttributeLabel('state_id'),
                    'type' => 'raw',
                    'value' => CHtml::link(CHtml::encode($model->state->name), array('state', 'id'=>$model->state_id)),
                ),
                array(
                    'label' => $model->getAttributeLabel('paper_id'),
                    'type' => 'raw',
                    'value' => CHtml::link(CHtml::encode($model->paper->fullInfo), array('paper', 'id'=>$model->paper_id)),
                ),
		'count',
		'height',
		'width',
		'mass',
                array(
                    'label' => $model->getAttributeLabel('created'),
                    'type' => 'raw',
                    'value' => CHtml::link(app::datetimeUserFriendly($model->created), array('date', 'id' => app::dateTimeByFormat($model->created, "Y-m-d"))),
                ),
                'updated',
                'note',
	),
)); ?>
