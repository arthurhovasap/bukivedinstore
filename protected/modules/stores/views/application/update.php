<?php
/* @var $this ApplicationController */
/* @var $model Application */

if ($model->code)
    $this->breadcrumbs=array(
            'Заявки'=>array('index'),
            $model->zakaz->nomer=>array('code','id'=>$model->zakaz->id),
            'Обновить',
    );
else
    $this->breadcrumbs=array(
            'Заявки'=>array('index'),
            array('view','id'=>$model->id),
            'Обновить',
    );

$this->menu=array(
	array('label'=>'Список заявок', 'url'=>array('index')),
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Просмотр заявки', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление заявками', 'url'=>array('admin')),
);
?>

<h1>Обновить заявку <?php echo ($model->code) ?  " №: ". $model->zakaz->nomer : ""; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'code'=>$model->zakaz)); ?>