<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name;
?>

<div class="wide form">
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
                    <?php echo $form->textField($model,'username'); ?>
                    <?php echo $form->error($model,'username'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Пароль
                </td>
                <td colspan=2>
                    <?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                    <?php echo $form->label($model,'rememberMe'); ?>
                    <?php echo $form->error($model,'rememberMe'); ?>
                </td>
                <td>
                    <?php echo CHtml::submitButton('Login'); ?>
                </td>
            </tr>
        </table>
    <?php $this->endWidget(); ?>
</div><!-- form -->
