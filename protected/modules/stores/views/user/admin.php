<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Управлять',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>

<p>Вы можете дополнительно ввести оператор сравнения (<, <=,>,> =, <> или =) в начале каждого из значений поиска, чтобы указать, как сравнение должно быть сделано.</p>

<?php echo CHtml::link('Продвинутый поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
        'pagerCssClass' => 'pagination pull-right',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		array(
                        'name' => 'customeremail',
                        'value' => '$data->work_email . ", " . $data->personal_email',
                ),
		array(
                        'name' => 'phone',
                        'value' => '$data->phoneToFormat()',
                ),
                'image',
		array( 
                    'name' => 'role_id',
                    'value' => '$data->role==null ? "Your text here" : $data->role->name',
                    'filter' => CHtml::listData(Role::model()->findAll(), 'id', 'name'),
                ),
		array(
                        'name' => 'customername',
                        'value' => '$data->firstname . " " . $data->lastname . " " . $data->secondname',
                ),
		array(
                    'class'=>'CButtonColumn',
		),
	),
)); ?>
