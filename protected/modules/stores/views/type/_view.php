<?php
/* @var $this TypeController */
/* @var $data Type */
?>
<div class="col-md-6 view text-center font h1 viewstore viewstore<?php echo $data->id; ?>">
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
</div>