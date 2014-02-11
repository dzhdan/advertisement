<?php
/* @var $this SiteController */

$this->pageTitle='Обьявления'?>

<div class="row ">
    <div class="col-md-12 text-center">
        <h3>Последние добавленные</h3>
    </div>
</div>
<div class="row ">
    <?php foreach($category as $cat): ?>
        <div class="col-md-4 advert-main">
            <div class="row  advert-head"> <h5 class="col-md-4 "><a href="advert/category/<?=$cat['id']?>"><?=$cat['ru_title']?></a></h5></div>
            <?php foreach($model as $advert): ?>
                <?php if($advert['category_id'] == $cat['id']) :?>
                    <div><a href="/advert/details/<?=$advert['id']?>"><?=$advert['title']?><?=$advert['category_id']?></a></div>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>


