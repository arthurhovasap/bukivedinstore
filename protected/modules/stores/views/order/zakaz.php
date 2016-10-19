<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->newsearch(),
        'pagerCssClass' => 'pagination pull-right',
	'columns'=>array(
		'lists_min_width',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>