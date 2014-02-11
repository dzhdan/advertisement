<?php ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'advert-form',
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
        'role'=>"form",
    ),
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <div class="form-group  col-md-4">
        <div>Заголовок</div>
        <input type="text" name='<?= get_class($model)?>[title]' class="form-control" value="<?php echo $model->title?>"  placeholder="Введите заголовок"/>

        <?php echo CHtml::activeDropDownList($model,'category_id', CHtml::listData(Category::model()->loadAllCategory(), 'id', 'ru_title')); ?>

        <div>Текст</div>
        <textarea name="<?= get_class($model)?>[text]" id="" class="form-control" rows="10">
            <?php echo $model->text?>
        </textarea>
        <div class=" buttons">
            <?php echo CHtml::submitButton('submit'); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>