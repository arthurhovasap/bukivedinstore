<?php
/* @var $this TypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Склады',
);
?>

<h1 class="text-center">Склады</h1>
<div class="col-md-12">
    <div class="col-md-12 text-center font h1 viewstore viewstore0">
        <?php echo CHtml::link("Заявки", array('application/admin')); ?>
        <div class="col-md-3 viewstorebystate viewstorebystate1 h3">
            <?php echo CHtml::link("В ожидании", array('application/onhold')); ?>
        </div>
        <div class="col-md-3 viewstorebystate viewstorebystate2 h3">
            <?php echo CHtml::link("Листы", array('application/list')); ?>
        </div>
        <div class="col-md-3 viewstorebystate viewstorebystate3 h3">
            <?php echo CHtml::link("Рулоны", array('application/role')); ?>
        </div>
        <div class="col-md-3 viewstorebystate viewstorebystate4 h3">
            <?php echo CHtml::link("Запасы", array('application/forstore')); ?>
        </div>
    </div>
    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
    )); ?>
</div>
