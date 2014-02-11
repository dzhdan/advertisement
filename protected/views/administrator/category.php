<?php
/* @var $this AdministratorController */

$this->breadcrumbs=array(
	'Administrator',
);
?>

<h2>Admin Area</h2>
<div class="row ">


    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->search(),
        'itemsCssClass' => 'table table-striped',
        'ajaxType'=>'post',
        'ajaxUpdate' => 'item-grid',
        'htmlOptions'=>array('class'=>'table','id'=>'item-grid'),
        /*'filter'=>$model,*/
        'columns'=>array(
            'id',
            'title',
            'text',
            array(
                'class'=>'CButtonColumn',
                'header'=>'Edit',
                'buttons'=>array(
                    'edit'=>array(
                        'label'=>'edit',
                       /* 'imageUrl'=>'images/grid_edit.png',*/
                        'url'   => 'Yii::app()->createUrl(\'admin/edit\',array(\'id\' => $data->id))',
                    ),
                ),
                'template'=>'{edit}',
            ),
            array(
                'class'=>'CButtonColumn',
                'header'=>'Publish',
                'buttons'=>array(
                    'publish'=>array(
                        'label'=>'publish',
                       /* 'imageUrl'=>'images/grid_edit.png',*/
                        'url'   => 'Yii::app()->createUrl(\'admin/edit\',array(\'id\' => $data->id))',
                    ),
                ),
                'template'=>'{publish}',
            )
        )
    ));
    ?>
</div>
</div>
<script type="text/javascript">
   $(document).ready(function () {

        $('#Advert_category_id').change(function(){
            $('#yw0').submit()
        })
        return false;
    });


/*$('#pp').click(function(){
    ;
})*/

</script>
