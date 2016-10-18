<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
        'pagerCssClass' => 'pagination pull-right',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pages_count',
		'calculation_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>