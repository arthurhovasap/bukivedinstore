<?php
/* @var $this ApplicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Заявки' => array('/stores'),
        'Бумаги',
);

$this->menu=array(
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Управлять заявками', 'url'=>array('admin')),
);
?>

<h1>Номер: <?php echo $model->nomer; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewcode',
        'pagerCssClass' => 'pagination pull-right',
)); ?>
<div class="col-md-12">
    <?php 
        $code = app::getParam('id');
        if (isset($code))
            print(file_get_contents("http://wfpi.ru/modules/zakaz/storeinfo.php?id=".$code));
    ?>
</div>