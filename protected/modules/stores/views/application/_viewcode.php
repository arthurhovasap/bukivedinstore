<?php
/* @var $this ApplicationController */
/* @var $data Application */
?>

<div class="view">
        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('paper_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->paper->fullInfo), array('paper', 'id'=>$data->paper_id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
        <?php echo CHtml::link(app::datetimeUserFriendly(CHtml::encode($data->created)), array('date', 'id' => app::dateTimeByFormat($data->created, "Y-m-d"))); ?>
        <br />
</div>