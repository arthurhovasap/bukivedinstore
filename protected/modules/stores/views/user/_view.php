<?php
/* @var $this UserController */
/* @var $data User */
?>
<div class="view">

        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)).' <span class="text-warning">' . CHtml::encode($data->role->name).'</span>'; ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('fio')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->getFIO()), array('view', 'id'=>$data->id)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('emails')); ?>:</b>
        <?php echo CHtml::encode($data->emails()); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
        <?php echo CHtml::encode($data->role->name); ?>
        <br />

        <?php /*
        <b><?php echo CHtml::encode($data->getAttributeLabel('creator_id')); ?>:</b>
        <?php echo CHtml::encode($data->creator_id); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
        <?php echo CHtml::encode($data->password); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
        <?php echo CHtml::encode($data->status_id); ?>
        <br />

        */ ?>
</div>