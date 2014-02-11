<?php
$cssClass = null;
$date = DateFormatter::strToDate($data->create_date);

if($data->pub_status == 1){
    $data->title .=  '(на модерации)';
    $cssClass = 'on_moderation';
}?>
<p>
    <?= Chtml::link($data->title,'/ff/ff', ['class'=>$cssClass] ) ?>
    <small class="date"><?= $date?></small>
    <a href="#">X</a>
</p>

