<?php
/* @var $this ApplicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        'Модули'=>array('/modules'),
        'Склады'=>array('/stores'),
        'Все заявки'=>array('/stores/application/admin'),
        'Бумага',
        $model->fullInfo
);

$this->pageTitle = "Управление заявками заказа ".$model->fullInfo;

$this->menu=array(
        array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Управлять заявками', 'url'=>array('admin')),
);
?>

<h1>Заявки на бумагу «<?php echo $model->fullInfo; ?>»</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-grid',
	'dataProvider'=>$models->search_by_paper($model->id),
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
                        'name' => 'nomer_search',
                        'value' => '($data->code) ? Chtml::link($data->zakaz->nomer ." (".$data->zakaz->id.")", app::$void0, array("class" => "stateSelector", "data-id" => $data->zakaz->nomer, "onclick"=>"clickonenomer(this)")) . " " . Chtml::link("<span class=\"glyphicon glyphicon-link\"></span>", array("code", "id" => $data->code)): NULL',
                        'type' => 'raw'
                ),
            
                array( 
                    'name' => 'state_id',
                    'type' => 'raw',
                    'value' => '$data->state==null ? "Your text here" : Chtml::link($data->state->name, app::$void0, array("class" => "stateSelector", "data-id" => $data->state_id, "onclick"=>"clickonestate(this)"))." ".Chtml::link("<span class=\"glyphicon glyphicon-link\"></span>", array("state", "id" => $data->state_id))',
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
                        'value' => 'Chtml::link(app::datetimeUserFriendly(CHtml::encode($data->created)), array("date", "id" => app::dateTimeByFormat($data->created, "Y-m-d")))',
                        'type' => 'html'
                ),
                 
                array(
                    'name'=>'count',
                    'value'=>'$data->count',
                    'type'=>'html',
                    'footer'=>($models->uniqueCount($models->search_by_paper($model->id)->getKeys())) ? $models->getTotals($models->search_by_paper($model->id)->getKeys()) : "",
                ),
            
                array(
                    'name'=>'status_id',
                    'value'=>'$data->buttonByStatus(array($data->id))',
                    'type'=>'raw',
                    'filter' => CHtml::activeDropDownList($models, 'status_id', array_combine(array_values(array("", "3", "1")), array("Все", "Новые", "В ожидании")), array('style' => 'width: 82px;')),
                ),
                            
		array(
			'class'=>'CButtonColumn',
                        'footer'=>$models->buttonByStatus($models->search_by_paper($model->id)->getKeys())
		),
	),
));                    
?>