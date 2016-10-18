<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимы.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-6">
                <div class="form-group">
                        <?php echo $form->labelEx($model,'title'); ?>
                        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети заголовок')); ?>
                        <?php echo $form->error($model,'title'); ?>
                </div>
        </div>
	<div class="col-md-6">
                <div class="form-group">
                        <?php echo $form->labelEx($model,'description'); ?>
                        <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class' => 'form-control', 'placeholder'=>'Введети информацию')); ?>
                        <?php echo $form->error($model,'description'); ?>
                </div>
        </div>
        
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary btn-block')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->