<div class="col-md-6">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'advert-form',
        'htmlOptions'=>array(
            'class'=>'',
            'role'=>"form",
        ),
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',['class'=>'form-control col-md-6']); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'category_id'); ?>
        <?php echo $form->dropDownList($model,'category_id',  CHtml::listData(Category::model()->loadAllCategory(), 'id', 'ru_title'),
            ['class'=>'form-control col-md-6','prompt'=>'Выберите категорию']);
        ?>
        <?php echo $form->error($model,'category_id'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'text'); ?>
        <?php echo $form->textArea($model,'text',['class'=>'form-control']); ?>
        <?php echo $form->error($model,'text'); ?>
    </div>
    <div class="form-group ">
        <?php echo CHtml::submitButton('Отправить',['class'=>'btn btn-default']); ?>
    </div>

<?php $this->endWidget(); ?>
</div>