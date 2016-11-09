<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'Склады'=>array('index'),
	$model->name,
);

$id = Yii::app()->request->getQuery('id');

/*$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
	array('label'=>'Update Type', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);*/
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-grid',
	'dataProvider'=>$models->searchbytype($id),
	'filter'=>$models,
        'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
        'pagerCssClass' => 'pagination pull-right',
        
	'columns'=>array(
		'id',
                'application_id',
                array(
                        'name' => 'nomer_search',
                        'value' => '($data->application->code) ? Chtml::link($data->application->zakaz->nomer ." (".$data->application->zakaz->id.")", app::$void0, array("class" => "stateSelector", "data-id" => $data->application->zakaz->id, "onclick"=>"clickonenomer(this)")) . " " . Chtml::link("<span class=\"glyphicon glyphicon-link\"></span>", array("code", "id" => $data->application->code)): NULL',
                        'type' => 'raw'
                ),
                array( 
                    'name' => 'paper_id',
                    'type' => 'raw',
                    'value' => 'Chtml::link($data->application->paper->fullInfo, app::$void0, array("class" => "paperSelector", "data-id" => $data->application->paper_id, "onclick"=>"clickone(this)"))." ".Chtml::link("<span class=\"glyphicon glyphicon-link\"></span>", array("paper", "id" => $data->application->paper_id))',
                    'filter' => CHtml::listData(Paper::model()->findAll(), 'id', 'fullInfo'),
                ),
                array( 
                    'name' => 'state_id',
                    'type' => 'raw',
                    'value' => '$data->application->state==null ? "Your text here" : Chtml::link($data->application->state->name, app::$void0, array("class" => "stateSelector", "data-id" => $data->state_id, "onclick"=>"clickonestate(this)"))',
                    'filter' => CHtml::listData(State::model()->findAll(), 'id', 'name'),
                ),
                array( 
                    'name' => 'height',
                    'type' => 'raw',
                    'value' => '$data->application->height==null ? "" : Chtml::link($data->application->height, app::$void0, array("class" => "heightSelector", "data-id" => $data->application->height, "onclick"=>"clickoneheight(this)"))',
                ),
                array( 
                    'name' => 'width',
                    'type' => 'raw',
                    'value' => '$data->application->width==null ? "" : Chtml::link($data->application->width, app::$void0, array("class" => "widthSelector", "data-id" => $data->application->width, "onclick"=>"clickonewidth(this)"))',
                ),
                array(
                        'name' => 'created_from',
                        'value' => 'Chtml::link(app::dateTimeByFormat(CHtml::encode($data->created), "d.m.Y"), app::$void0, array("class" => "created_fromSelector", "data-id" => app::dateTimeByFormat(CHtml::encode($data->created), "d.m.Y"), "onclick"=>"clickonecreated_from(this)"))',
                        'type' => 'raw',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$models, 
                            'attribute'=>'created_from', 
                            'language' => 'ru',
                            // 'i18nScriptFile' => 'jquery.ui.datepicker-ru.js', (#2)
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_created_from',
                                'size' => '10',
                            ),
                            'defaultOptions' => array(  // (#3)
                                'showOn' => 'focus', 
                                'dateFormat' => 'dd.mm.yy',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            )
                        ), 
                        true), // (#4)
                ),
                array(
                        'name' => 'created_to',
                        'value' => 'Chtml::link(app::dateTimeByFormat(CHtml::encode($data->created), "d.m.Y"), app::$void0, array("class" => "created_toSelector", "data-id" => app::dateTimeByFormat(CHtml::encode($data->created), "d.m.Y"), "onclick"=>"clickonecreated_to(this)"))',
                        'type' => 'raw',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$models, 
                            'attribute'=>'created_to', 
                            'language' => 'ru',
                            // 'i18nScriptFile' => 'jquery.ui.datepicker-ru.js', (#2)
                            'htmlOptions' => array(
                                'id' => 'datepicker_for_created_to',
                                'size' => '10',
                            ),
                            'defaultOptions' => array(  // (#3)
                                'showOn' => 'focus', 
                                'dateFormat' => 'dd.mm.yy',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            )
                        ), 
                        true), // (#4)
                ),
                array(
                    'name'=>'acount',
                    'value'=>'$data->application->count',
                    'type'=>'html',
                    'filter'=>false,
                    //'footer'=>($models->uniqueCount($models->searchbytype($id)->getKeys())) ? $models->getTotals($models->searchbytype($id)->getKeys()) : "",
                ),
		array(
			'class'=>'CButtonColumn',
                        //'footer'=>$model->buttonByStatus($model->search()->getKeys())
		),
	),
)); 
// (#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_created_from').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['ru'],{'dateFormat':'dd.mm.yy'}));
    
    $('#datepicker_for_created_to').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['ru'],{'dateFormat':'dd.mm.yy'}));
}
");                    
?>
