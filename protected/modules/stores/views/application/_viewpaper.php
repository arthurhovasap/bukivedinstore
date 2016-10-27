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
        <?php endif; ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
        <?php echo CHtml::link(app::datetimeUserFriendly(CHtml::encode($data->created)), array('date', 'id' => app::dateTimeByFormat($data->created, "Y-m-d"))); ?>
        <br />
</div>