<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимы.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="col-md-4">
            <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети никнейм', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'username'); ?>
            </div>
            
            <div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети имя', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'firstname'); ?>
            </div>
            
            <div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети фамилию', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'lastname'); ?>
            </div>
            
            <div class="row">
		<?php echo $form->labelEx($model,'secondname'); ?>
		<?php echo $form->textField($model,'secondname',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети отчество', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'secondname'); ?>
            </div>
            
            <div class="row">
                    <?php echo $form->labelEx($model,'role_id'); ?>
                    <?php $type_list=array(NULL=>Yii::t('t', 'Выберите Права...'))+CHtml::listData(Role::model()->findAll(),'id','name'); ?>
                    <?php echo $form->dropDownList($model, 'role_id', $type_list, array('options' => array($model->role_id=>array('selected'=>true)))); ?>
                    <?php echo $form->error($model,'role_id'); ?>
            </div>
        </div>
	
        <div class="col-md-4">
            <div class="row">
		<?php echo $form->labelEx($model,'personal_email'); ?>
		<?php echo $form->textField($model,'personal_email',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети почту', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'personal_email'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'work_email'); ?>
                    <?php echo $form->textField($model,'work_email',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети почту', 'autocomplete'=>'off')); ?>
                    <?php echo $form->error($model,'work_email'); ?>
            </div>
            
            <div class="row">
                    <?php echo $form->labelEx($model,'passport'); ?>
                    <?php echo $form->textField($model,'passport',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети серию паспорта', 'autocomplete'=>'off')); ?>
                    <?php echo $form->error($model,'passport'); ?>
            </div>
            
            <div class="row">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети никнейм', 'autocomplete'=>'off')); ?>
                    <?php echo $form->error($model,'password'); ?>
            </div>
            
            <div class="row">
                    <?php echo $form->labelEx($model,'repassword'); ?>
                    <?php echo $form->passwordField($model,'repassword',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Введети пароль еще раз', 'autocomplete'=>'off')); ?>
                    <?php echo $form->error($model,'repassword'); ?>
            </div>
        </div>
        
        <div class="form-user-avatar-block col-md-4">
            <?php 
                echo CHtml::image($model->avatar(), '', array('class'=>'img-circle')); 
            ?>
        </div>
        
        <div class="col-md-12">
             <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->