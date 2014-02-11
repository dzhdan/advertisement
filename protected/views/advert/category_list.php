<?php
/* @var $this SiteController */

$this->pageTitle='Обьявления'?>

<div class="row">
    <div class="col-md-12">
        <?php if(count($model) == 0):?>
            <div>В этой категории нет записей</div>
        <?php endif;?>
        <?php foreach($model as $advert): ?>
            <div>
                <a href="/advert/details/<?=$advert['id']?>"><?=$advert['title']?></a>
            </div>
        <?php endforeach; ?>
    </div>

</div>