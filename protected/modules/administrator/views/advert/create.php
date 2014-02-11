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
    <input type="text" name='<?= get_class($model)?>[title]' class="form-control"  placeholder="Введите заголовок"/>
    <select name="<?= get_class($model)?>[category_id]" class="form-control"  >
        <?php foreach($categories as $category) :?>
            <option value="<?=$category['id']?>"><?=$category['ru_title']?></option>
        <?php endforeach;?>
    </select>
    <div>Текст</div>
    <textarea name="<?= get_class($model)?>[text]" id="" cols="30" class="form-control"6 rows="10"></textarea>
    <div class=" buttons">
        <?php echo CHtml::submitButton('submit'); ?>
    </div>
</div>

    
<?php $this->endWidget(); ?>