<?php
/* @var $this ApplicationController */
/* @var $data Application */
?>

<div class="view">
        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <?php if ($data->code) : ?>
            <b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->zakaz->nomer), array('code', 'id'=>$data->code)); ?>
            <br />
        <?php endif ; ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('paper_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->paper->fullInfo), array('paper', 'id'=>$data->paper_id)); ?>
	<br />
</div>