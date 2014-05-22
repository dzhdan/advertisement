<?php
/* @var $this SiteController */

$this->pageTitle='Обьявления'?>

<div class="row ">
    <div class="col-md-12 text-center">
        <h3>Последние добавленные</h3>
    </div>
</div>
<div class="row "><?php $i = 0 ?>
    <?php foreach($category as $cat): ?>
        <div class="col-md-4 advert-main">
            <div class="row  advert-head">
                <h5 class="col-md-4 ">
                    <a href="advert/category/<?=$cat['id']?>"><?=$cat['ru_title']?></a>
                </h5>
            </div>
            <?php $i = 0?>
            <?php foreach($model as $advert): ?>
                <?php if($advert['category_id'] == $cat['id']) :?>
                    <div>
                        <a href="/advert/<?=$advert['id']?>"><?=$advert['title']?><?=count($advert['category_id'])?></a>
                    </div>
                    <?php if(++$i === $limit){
                             break;
                         }
                    ?>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>


