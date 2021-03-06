<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
        'Модули'=>array('/modules'),
        'Склады'=>array('/stores'),
        'Управление заявками',
);

$this->pageTitle = "Управление заявками";

$this->menu=array(
        array('label'=>'Создать заявку', 'url'=>array('create')),
);
?>

<h1>Управление заявками</h1>

<?php if(Yii::app()->user->hasFlash('status')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('status'); ?>
</div>

<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
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
                    'name' => 'paper_id',
                    'value' => 'Chtml::link($data->paper->fullInfo, app::$void0, array("class" => "paperSelector", "data-id" => $data->paper_id, "onclick"=>"clickone(this)"))." ".Chtml::link("<span class=\"glyphicon glyphicon-link\"></span>", array("paper", "id" => $data->paper_id))',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Paper::model()->findAll(), 'id', 'fullInfo'),
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
                /*array(
                        'name' => 'created',
                        'value' => 'Chtml::link(app::datetimeUserFriendly(CHtml::encode($data->created)), array("date", "id" => app::dateTimeByFormat($data->created, "Y-m-d")))',
                        'type' => 'html'
                ),*/
                array(
                        'name' => 'created_from',
                        'value' => 'Chtml::link(app::dateTimeByFormat(CHtml::encode($data->created), "d.m.Y"), app::$void0, array("class" => "created_fromSelector", "data-id" => app::dateTimeByFormat(CHtml::encode($data->created), "d.m.Y"), "onclick"=>"clickonecreated_from(this)"))',
                        'type' => 'raw',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model, 
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
                            'model'=>$model, 
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
                    'name'=>'count',
                    'value'=>'$data->count',
                    'type'=>'html',
                    'filter'=>false,
                    'footer'=>($model->uniqueCount($model->search()->getKeys())) ? $model->getTotals($model->search()->getKeys()) : "",
                ),
            
                array(
                    'name'=>'status_id',
                    'value'=>'$data->buttonByStatus(array($data->id))',
                    'type'=>'raw',
                    'filter' => CHtml::activeDropDownList($model, 'status_id', array_combine(array_values(array("", "3", "1")), array("Все", "Новые", "В ожидании")), array('style' => 'width: 82px;')),
                ),
                            
		array(
			'class'=>'CButtonColumn',
                        'footer'=>$model->buttonByStatus($model->search()->getKeys())
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
