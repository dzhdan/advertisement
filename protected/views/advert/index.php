<?php
/* @var $this AdvertController */
?>
<h3><?= $model->title ?></h3>
<p><?= DateFormatter::strToDate($model->create_date) ?></p>
<div>
    <?= nl2br($model->text)?>
</div>


<a href="<?= Yii::app()->user->returnUrl;  ?>">wqegwqegwqeg</a>