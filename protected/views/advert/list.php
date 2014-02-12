<div class="row col-md-12">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->userAdverts(),
        'itemsCssClass' => 'table table-striped',
        'htmlOptions'=>array('class'=>'table','id'=>'item-grid'),
        'columns'=>array(
            array(
                'name'=>'id',
                'value'=>'$data->id',
                'header'=>'№',
                'htmlOptions'=>array(
                    'width'=>'40px'
                )
            ),
            'title',
            [
                'name'=>'pub_status',
                'header'=>'Статус',
                'value'=>function($data){
                        if($data->pub_status == 1){
                            $data->pub_status = 'на модерации';
                        }
                        else{
                            $data->pub_status = 'активно';
                        }
                        return $data->pub_status;
                    }
            ],
            [
                'name'=>'create_date',
                'value'=>function($data){
                        return DateFormatter::strToDate($data->create_date);
                    }
            ],
            [
                'class'=>'CButtonColumn',
                'header'=>'Edit',
                'buttons'=>array(
                    'edit'=>array(
                        'label'=>'edit',
                        'url'   => 'Yii::app()->createUrl(\'advert/edit\',array(\'id\' => $data->id))',
                    ),
                ),
                'template'=>'{edit}',
            ],
            [
                'class'=>'CButtonColumn',
                'header'=>'Удалить',
                'buttons'=>array(
                    'delete'=>array(
                        'label'=>'edit',
                        'url'   => 'Yii::app()->createUrl(\'advert/delete\',array(\'id\' => $data->id))',
                    ),
                ),
                'template'=>'{delete}',
            ],

        )
    ));
    ?>
</div>

<?php /*$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_post',   // refers to the partial view named '_post'
    'sortableAttributes'=>array(
        'title',
        'create_date',


        'pub_status'

    ),
));
*/?>
