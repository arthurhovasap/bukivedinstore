<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	'создать',
);

$this->menu=array(
	array('label'=>'Список заявок', 'url'=>array('index')),
	array('label'=>'Управление заявками', 'url'=>array('admin')),
);
?>

<h1>Создать заявку</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>