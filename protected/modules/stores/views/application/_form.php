<?php
/* @var $this ApplicationController */
/* @var $model Application */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
        <div class="col-md-12">
            
            <?php if (isset($code))
                print(file_get_contents("http://wfpi.ru/modules/zakaz/storeinfo.php?id=".$code->id));
            ?>
            
            <p class="note">Поля с <span class="required">*</span> необходимы.</p>
        </div>
        
        
        <div class="col-md-6">
            <?php 
                if ($model->isNewRecord) { 
                    if (isset($code) && !is_null ($code)) : ?>
                    <div class="form-group">
                            <?php echo $form->labelEx($model,'code'); ?>
                            <?php echo $form->textField($model,'code',array('class' => 'form-control', 'size'=>50,'maxlength'=>50, 'readonly'=>'readonly', 'value'=>$code['id'])); ?>
                            <?php echo $form->error($model,'code'); ?>
                    </div>
                <?php endif; }else{ if (!is_null ($code)) : ?>
                    <div class="form-group">
                            <?php echo $form->labelEx($model,'code'); ?>
                            <?php echo $form->textField($model,'code',array('class' => 'form-control', 'size'=>50,'maxlength'=>50, 'disabled'=>'disabled', 'value'=>$code['id'])); ?>
                    </div>
                <?php endif; } ?>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'state_id'); ?>
                    <?php $type_list=CHtml::listData(State::model()->findAll(),'id','name'); ?>
                    <?php echo $form->dropDownList($model, 'state_id', array(''=>Yii::t('t', 'Выберите состояние'))+$type_list, array('class'=>'form-control', 'options' => array($model->state_id=>array('selected'=>true)))); ?>
                    <?php echo $form->error($model,'state_id'); ?>
            </div>
            
            <div class="form-group">
                    <?php echo $form->labelEx($model,'paper_id'); ?>
                    <?php $criteria = new CDbCriteria();
                    $criteria->select = "id, title, density, depth";
                    $type_list=CHtml::listData(Paper::model()->findAll($criteria),'id','fullInfo'); ?>
                    <?php echo $form->dropDownList($model, 'paper_id', array(''=>Yii::t('t', 'Выберите бумагу'))+$type_list, array('class'=>'form-control', 'options' => array($model->paper_id=>array('selected'=>true)))); ?>
                    <?php echo $form->error($model,'paper_id'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'count'); ?>
                    <?php echo $form->numberField($model,'count', array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети колличество')); ?>
                    <?php echo $form->error($model,'count'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'height'); ?>
                    <?php echo $form->numberField($model,'height', array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети высоту')); ?>
                    <?php echo $form->error($model,'height'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'width'); ?>
                    <?php echo $form->numberField($model,'width', array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети ширину')); ?>
                    <?php echo $form->error($model,'width'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'mass'); ?>
                    <?php echo $form->textField($model,'mass', array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети массу')); ?>
                    <?php echo $form->error($model,'mass'); ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                    <?php echo $form->labelEx($model,'note'); ?>
                    <?php echo $form->textArea($model,'note',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
                    <?php echo $form->error($model,'note'); ?>
            </div>

            <div class="form-group">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary btn-block')); ?>
            </div>
        </div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->