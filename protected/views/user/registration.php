<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = 'Registration Form';
?>

    <!--<div class="col-md-6">-->
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>[
          'role'=>'form',
          'class' =>"form-horizontal",
        ],
    )); ?>

    <div class="form-group">
        <div class="col-md-4">
            <?php echo $form->label($model,'name'); ?>
            <?php echo $form->textField($model,'name', ['class'=>'form-control']); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
            <?php echo $form->label($model,'email'); ?>
            <?php echo $form->textField($model,'email', ['class'=>'form-control']); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
            <?php echo $form->label($model,'password'); ?>
            <?php echo $form->textField($model,'password', ['class'=>'form-control']); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
            <?php echo $form->label($model,'passwordRepeat'); ?>
            <?php echo $form->textField($model,'passwordRepeat', ['class'=>'form-control']); ?>
            <?php echo $form->error($model,'passwordRepeat'); ?>
        </div>
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-4">


            </div>
        </div>

        <div class="col-md-4">
            <div>
                <?php echo $form->labelEx($model,'verifyCode'); ?>
            </div>
            <?php $this->widget('CCaptcha'); ?>

            <?php echo $form->textField($model,'verifyCode', ['class'=>'form-control']); ?>
            <?php echo $form->error($model,'verifyCode'); /*ошибка при вводе каптчи*/?>
        </div>

    </div>

    <div class="form-group">
        <div class="col-md-4">
            <?php echo CHtml::submitButton('Login',array('class'=>'form-control')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>
   <!-- </div>-->
<!-- form -->
