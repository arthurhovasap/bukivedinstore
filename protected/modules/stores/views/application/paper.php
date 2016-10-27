<?php
/* @var $this ApplicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Заявки' => array('/stores/application'),
        'Бумаги' => array('/stores/application/paper'),
        $model->fullInfo
);

$this->menu=array(
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Управлять заявками', 'url'=>array('admin')),
);
?>

<h1>Бумага: <?php echo $model->fullInfo; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewpaper',
)); ?>