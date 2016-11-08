<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	'Упавлять',
);

$this->menu=array(
	//array('label'=>'Список заявок', 'url'=>array('index')),
	array('label'=>'Создать заявку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#application-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление заявками</h1>

<?php if(Yii::app()->user->hasFlash('status')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('status'); ?>
</div>

<?php endif; ?>

<p>Вы можете дополнительно ввести оператор сравнения (<, <=,>,> =, <> или =) в начале каждого из значений поиска, чтобы указать, как сравнение должно быть сделано.</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

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
		'id',
		array(
                        'name' => 'nomer_search',
                        'value' => '($data->code) ? Chtml::link($data->zakaz->nomer, array("code", "id" => $data->code)) : NULL',
                        'type' => 'html'
                ),
		/*array(
                    'name'=>'count',
                    'value'=>function($data){
                        return $data->count."(".$data->getDialyCount().")";
                    },
                    'type'=>'text',
                    'footer'=>$model->getTotals($model->search()->getKeys()),
                ),*/

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
                
                /*array(
                    'name'=>'total_count',
                    'value'=>function($data){
                        return "<span class='center-block text-center bg-" .(($data->status_id == 3) ? "danger" : "warning"). " text-".(($data->status_id == 3) ? "danger" : "warning")."'><b>".$data->getDialyCount()."</b></span>";
                    },
                    'type'=>'html',
                    'filter'=>false,
                    //'footer'=>($model->uniqueCount($model->search()->getKeys())) ? $model->getTotals($model->search()->getKeys()) : "",
                ),
                array( 
                    'name' => 'status_id',
                    'value' => '$data->status_id==3 ? "Your text here" : $data->state->name',
                    'filter' => CHtml::listData(State::model()->findAll(), 'id', 'name'),
                ),*/            
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
                    'filter' => CHtml::activeDropDownList($model, 'status_id', array_combine(array_values(array("", "3", "1")), array("Все", "Заявки", "В ожидании")), array('style' => 'width: 82px;')),
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
