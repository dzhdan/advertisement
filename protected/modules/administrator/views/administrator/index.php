<?php
/* @var $this AdministratorController */

$this->breadcrumbs=array(
	'Administrator',
);
?>
<div class="row col-md-12">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->search(),
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
            array(
                'class'=>'CButtonColumn',
                'header'=>'Edit',
                'buttons'=>array(
                    'edit'=>array(
                        'label'=>'edit',
                        'url'   => 'Yii::app()->createUrl(\'advert/edit\',array(\'id\' => $data->id))',
                    ),
                ),
                'template'=>'{edit}',
            ),
            array(
                'class'=>'CButtonColumn',
                'header'=>'Удалить',
                'buttons'=>array(
                    'delete'=>array(
                        'label'=>'publish',
                       /* 'imageUrl'=>'images/grid_edit.png',*/
                        'url'   => 'Yii::app()->createUrl(\'admin/edit\',array(\'id\' => $data->id))',
                    ),
                ),
                'template'=>'{delete}',
            )
        )
    ));
    ?>
</div>
</div>

