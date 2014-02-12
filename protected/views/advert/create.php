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
        <?php echo $form->dropDownList($model,'category_id',  CHtml::listData(Category::model()->loadAllCategory(), 'id', 'ru_title'),['class'=>'form-control col-md-6','prompt'=>'Выберите категорию:']); ?>
        <?php echo $form->error($model,'category_id'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'text'); ?>
        <?php echo $form->textArea($model,'text',['class'=>'form-control']); ?>
        <?php echo $form->error($model,'text'); ?>
    </div>
<div class="form-group ">
    <?php echo CHtml::submitButton('submit'); ?>
</div>

<?php $this->endWidget(); ?>
</div>
<!--<div class="form-group  col-md-4">
<div>Заголовок</div>
    <input type="text" name='<?/*= get_class($model)*/?>[title]' class="form-control"  placeholder="Введите заголовок"/>
    <select name="<?/*= get_class($model)*/?>[category_id]" class="form-control"  >
        <?php /*foreach($categories as $category) :*/?>
            <option value="<?/*=$category['id']*/?>"><?/*=$category['ru_title']*/?></option>
        <?php /*endforeach;*/?>
    </select>
    <div>Текст</div>
    <textarea name="<?/*= get_class($model)*/?>[text]" id="" cols="30" class="form-control"6 rows="10"></textarea>
    <div class=" buttons">
        <?php /*echo CHtml::submitButton('submit'); */?>
    </div>
</div>-->

    
