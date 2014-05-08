
<div  class="border row col-md-12">
    <div class="wrap">
    <?php $form=$this->beginWidget('CActiveForm', [
            'enableAjaxValidation'=>true,
        ]);
    ?>

    <?php
        echo CHtml::ajaxSubmitButton('Delete', ['advert/ajaxdelete'],
        ['success'=>'reloadGrid'],
        ['class'=>'btn delete_button btn-default btn-sm ',]);
    ?>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
       'dataProvider'=>$model->search(),
       'summaryText'=>false,
       'htmlOptions'=>[
           'id'=>'menu-grid',

       ],
        'ajaxUpdate'=>'true',
        'itemsCssClass' => 'table table-striped',

        'filter'=>$model,

        'columns'=>[
            [
                'id'=>'autoId',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
                'checkBoxHtmlOptions'=>[
                    'class'=>'deleted_checkbox'
                ],
                'headerHtmlOptions'=>[
                    'class'=>'deleted_checkbox'
                ],
            ],
            [
                'name'=>'id',
                'headerHtmlOptions'=>[
                    'class'=>'px'
                ],
            ],
            [
                'name'=>'name',

            ],
            [
                'name'=>'email',

            ],
            [
                'name'=>'role',
            ],
            [
                'name'=>'last_activity',
                'header'=>'Status',
                'type'=>'html',
                'value'=>function($data){
                    if($data->isUserOnline()){
                        return '<span class ="online">Online</span>';
                    }else{
                        return '<span class ="offline">Offline</span>';
                    }
                }
            ],

           [
                'class'=>'CButtonColumn',
                'header'=>'Edit',
                'buttons'=>[
                    'edit'=>[
                        'label'=>'edit',
                        'url'   => 'Yii::app()->createUrl(\'advert/edit\',array(\'id\' => $data->id))',
                    ],
                ],
                'template'=>'{edit}',
           ],
           [
               'class'=>'CButtonColumn',
               'header'=>'Delete',
               'buttons'=>[
                   'delete'=>[
                       /*'label'=>'delete',*/
                       'url'   => 'Yii::app()->createUrl(\'/advert/delete\', array(\'id\' => $data->id))',

                   ],
               ],
               'template'=>'{delete}',
           ],
        ]
    ));
    ?>
   <script>
        var countChecked;
        function reloadGrid(data) {
            $('.delete_button').attr('disabled',true)
            $.fn.yiiGridView.update('menu-grid');
        }

       $('.deleted_checkbox').live('change',function(){

           countChecked = $('.deleted_checkbox:checked').length;

           if($('.deleted_checkbox:checked').length > 0){
               $('.delete_button').attr('disabled',false)
           }

           else{
               $('.delete_button').attr('disabled',true)
           }
       }).change()

        $('.delete_button').click(function(){
            var isGood=confirm('\t Are you sure ?\n' + countChecked + ' items will be removed.' );
            if (!isGood) {
                return false;
            }
        })



    </script>
    <?php $this->endWidget(); ?>
    </div>
</div>



