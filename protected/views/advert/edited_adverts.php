<?php
/* @var $this AdministratorController */

$this->breadcrumbs=array(
    'Administrator',
);
?>

<div class="row col-md-12">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->searchInEdited(),
        'id'=>'edited_grid',
        'ajaxUpdate'=>true,
        'itemsCssClass' => 'table table-striped',
        'htmlOptions'=>array('class'=>'table','id'=>'item-grid'),
        'filter'=>$model,
        'columns'=>array(
            array(
                'name'=>'id',
                'value'=>'$data->id',
                'htmlOptions'=>array(
                    'width'=>'40px'
                )
            ),
            array(
                'name'=>'category_id',
                'value'=>'$data->category->ru_title',
                'filter'=>CHtml::dropDownList('Advert[category_id]',
                    $model->category_id,
                    CHtml::listData( Category::model()->loadAllCategory(),'id','ru_title'),
                    array(
                        'empty' => 'Все',
                    )
                ),
            ),
            'title',
            'text',
            [
                'type'=>'raw',
                'value'=>function($data){
                      return CHtml::link('text', ["advert/editedConfirm", "id"=>$data->id], ["class"=>"ajaxupdate"]);
                }
            ],
        )
    ));
    Yii::app()->clientScript->registerScript('ajaxupdate', "
    $('#item-grid a.ajaxupdate').live('click', function() {
        $.fn.yiiGridView.update('item-grid', {
            type: 'POST',
            url: $(this).attr('href'),
            success: function() {
                    $.fn.yiiGridView.update('item-grid');
            }
        });
        return false;
    });
");
?>
</div>
</div>

