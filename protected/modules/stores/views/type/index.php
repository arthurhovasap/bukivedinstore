<?php
/* @var $this TypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Types',
);

$this->menu=array(
	array('label'=>'Create Type', 'url'=>array('create')),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);
?>

<h1>Склады</h1>
<div class="col-md-12">
    <div class="col-md-12 text-center font h1 viewstore viewstore0">
        <?php echo CHtml::link("Заявки", array('application/admin')); ?>
    </div>
    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
    )); ?>
</div>
