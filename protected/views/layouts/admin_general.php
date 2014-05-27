<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="../../../css/style.css"/>
    <!--<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container-fluid ">

    <div class="row">
        <div class=" col-md-12" id="header">
            <ul class="header-menu">
                <li>
                    <a href="/advert/create">Добавить обьявление</a>
                </li>
                <li>::</li>
                <li>
                    <?php if(!Yii::app()->user->isGuest):?>
                        <a href="/user/logout">Выход</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="row mb">
        <div class="col-md-2  ">
            <div class="menu-wrapper">
            <ul class="list-unstyled menu">
                <li><a href="/administrator">Все обьявления</a></li>
                <li><a href="#">Категории</a></li>
                <li><a href="#">Категории</a></li>
                <li><a href="/administrator/users">Пользователи</a></li>
                <?php if(Advert::model()->getCountEditedAdverts()):?>
                   <li>
                       <a href="/administrator/edited">Редактированные
                           <span class="count-edited-advert"><?= Advert::model()->getCountEditedAdverts() ?></span>
                       </a>
                   </li>
                <?php endif; ?>
                <?php if(Advert::model()->getCountNewAdverts()):?>
                    <li>
                        <a href="/administrator/new">Новые обьявления
                            <span class="count-new-advert"><?= Advert::model()->getCountNewAdverts() ?></span>
                        </a>
                    </li>
                 <?php endif; ?>
            </div>
            </ul>
        </div>
            <?php if(Yii::app()->user->hasFlash('success')):?>
                <?php echo Yii::app()->user->getFlash('success'); ?>
            <?php endif; ?>

        <div class="col-md-10">
            <div class="row col-md-12 ">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
