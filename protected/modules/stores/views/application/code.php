<?php
/* @var $this ApplicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        'Модули'=>array('/modules'),
        'Склады'=>array('/stores'),
        'Все заявки'=>array('/stores/application/admin'),
        'Заказ',
        $model->nomer
);

$this->pageTitle = "Управление заявками заказа ".$model->nomer;

$this->menu=array(
        array('label'=>'Создать заявку', 'url'=>array('create')),
        array('label'=>'Управлять заявками', 'url'=>array('admin')),
);
?>

<h1>Заявки на заказ «<?php echo $model->nomer; ?>»</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-grid',
	'dataProvider'=>$models->search_by_code($model->id),
	'filter'=>$models,
        'pagerCssClass' => 'pagination pull-right',
        'rowCssClassExpression'=>'
            ( $data->statusClassGenerator() ) .
            ( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] )
        ',
	'columns'=>array(
                array( 
                    'name' => 'id',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->id, array("view", "id"=>$data->id))',
                ),
                array( 
                    'name' => 'paper_id',
                    'value' => 'Chtml::link($data->paper->fullInfo, app::$void0, array("class" => "paperSelector", "data-id" => $data->paper_id, "onclick"=>"clickone(this)"))." ".Chtml::link("<span class=\"glyphicon glyphicon-link\"></span>", array("paper", "id" => $data->paper_id))',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Paper::model()->findAll(), 'id', 'fullInfo'),
                ),
            
                array( 
                    'name' => 'state_id',
                    'type' => 'raw',
                    'value' => '$data->state==null ? "Your text here" : Chtml::link($data->state->name, app::$void0, array("class" => "stateSelector", "data-id" => $data->state_id, "onclick"=>"clickonestate(this)"))',
                    'filter' => CHtml::listData(State::model()->findAll(), 'id', 'name'),
                ),
		array( 
                    'name' => 'height',
                    'type' => 'raw',
                    'value' => '$data->height==null ? "" : Chtml::link($data->height, app::$void0, array("class" => "heightSelector", "data-id" => $data->height, "onclick"=>"clickoneheight(this)"))',
                ),
                array( 
                    'name' => 'width',
                    'type' => 'raw',
                    'value' => '$data->width==null ? "" : Chtml::link($data->width, app::$void0, array("class" => "widthSelector", "data-id" => $data->width, "onclick"=>"clickonewidth(this)"))',
                ),
                array(
                    'name' => 'created',
                    'value' => 'app::datetimeUserFriendly(CHtml::encode($data->created))',
                    'filter' => false,
                ),
                 
                array(
                    'name'=>'count',
                    'value'=>'$data->count',
                    'filter'=>false,
                    'type'=>'html',
                    'footer'=>($models->uniqueCount($models->search_by_code($model->id)->getKeys())) ? $models->getTotals($models->search_by_code($model->id)->getKeys()) : "",
                ),
            
                array(
                    'name'=>'status_id',
                    'value'=>'$data->buttonByStatus(array($data->id))',
                    'type'=>'raw',
                    'filter' => CHtml::activeDropDownList($models, 'status_id', array_combine(array_values(array("", "3", "1")), array("Все", "Новые", "В ожидании")), array('style' => 'width: 82px;')),
                ),
                            
		array(
			'class'=>'CButtonColumn',
                        'footer'=>$models->buttonByStatus($models->search_by_code($model->id)->getKeys())
		),
	),
));                    
?>

<div class="col-md-12">
    <?php 
        $code = app::getParam('id');
        if (isset($code))
            print(file_get_contents("http://wfpi.ru/modules/zakaz/storeinfo.php?id=".$code));
    ?>
</div>