<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Редактировать пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Просмотр пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
                'firstname',
                'lastname',
                'secondname',
                array(
                    'label' => $model->getAttributeLabel('passport'),
                    'type' => 'raw',
                    'value' => $model->passport,
                    'visible'=> ($model->role_id != NULL) ? true : false,
                ),
		'personal_email',
		'work_email',
		array(
                    'label' => $model->getAttributeLabel('created'),
                    'type' => 'raw',
                    'value' => app::datetimeUserFriendly($model->created),
                ),
		array(
                    'label' => $model->getAttributeLabel('updated'),
                    'type' => 'raw',
                    'value' => app::datetimeUserFriendly($model->updated),
                ),
		array(
                    'label' => $model->getAttributeLabel('role_id'),
                    'type' => 'raw',
                    'value' => $model->role->name,
                ),
		array(
                    'label' => $model->getAttributeLabel('creator_id'),
                    'type' => 'raw',
                    'value' => ($model->creator_id) ? $model->creator->firstname . ' ' . $model->creator->lastname .' пользователем': 'Через форму регистрации',
                ),
		array(
                    'label' => html::tagClass('span', $model->getAttributeLabel('password'), 'text-danger'),
                    'type' => 'raw',
                    'value' => html::tagClass('span', 'Защищен', 'text-danger'),
                ),
		array(
                    'label' => $model->getAttributeLabel('status_id'),
                    'type' => 'raw',
                    'value' => $model->status->name,
                ),
	),
)); ?>
