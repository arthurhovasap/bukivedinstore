<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	'Упавлять',
);

$this->menu=array(
	array('label'=>'Список заявок', 'url'=>array('index')),
	array('label'=>'Создать заявку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#application-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление заявками</h1>

<p>Вы можете дополнительно ввести оператор сравнения (<, <=,>,> =, <> или =) в начале каждого из значений поиска, чтобы указать, как сравнение должно быть сделано.</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'pagerCssClass' => 'pagination pull-right',
	'columns'=>array(
		'id',
		array(
                        'name' => 'nomer_search',
                        'value' => '($data->code) ? Chtml::link($data->zakaz->nomer, array("code", "id" => $data->code)) : NULL',
                        'type' => 'html'
                ),
		'count',
		/*array(
                        'name' => 'paper_search',
                        'value' => 'Chtml::link($data->paper->fullInfo, array("paper", "id" => $data->paper_id))',
                        'type' => 'html'
                ),*/
                array( 
                    'name' => 'paper_id',
                    'value' => 'Chtml::link($data->paper->fullInfo, array("paper", "id" => $data->paper_id))',
                    'type' => 'html',
                    'filter' => CHtml::listData(Paper::model()->findAll(), 'id', 'fullInfo'),
                ),
            
                array( 
                    'name' => 'state_id',
                    'value' => '$data->state==null ? "Your text here" : $data->state->name',
                    'filter' => CHtml::listData(State::model()->findAll(), 'id', 'name'),
                ),
		'height',
		'width',
		'mass',
                array(
                        'name' => 'created',
                        'value' => 'Chtml::link(app::datetimeUserFriendly(CHtml::encode($data->created)), array("date", "id" => app::dateTimeByFormat($data->created, "Y-m-d")))',
                        'type' => 'html'
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
