<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name;
?>

<div class="form-group">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
Вход
        <table>
            <tr>
                <td>
                   Логин
                </td>
                <td colspan=2>
                    <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Пароль
                </td>
                <td colspan=2>
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo CHtml::submitButton('Login',array('class'=>'form-control')); ?>
                </td>
            </tr>
        </table>
    <?php $this->endWidget(); ?>
</div><!-- form -->
