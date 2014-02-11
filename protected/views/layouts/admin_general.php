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
<div class="container ">
    <div class="row ">
        <nav class="navbar navbar-default " role="navigation">
                <!--<div class="col-md-10"><h2><a href="<?/*= Yii::app()->homeUrl */?>">Городская доска обьявлений</a> </h2></div>-->
        </nav>
        <div class=" ">
            <div class="col-md-12 border">
                <div> <a href="/advert/create">Добавить обьявление</a></div>
                <?php if(!Yii::app()->user->isGuest):?>
                    <div>
                        <a href="/user/logout">Выход</a>
                    </div>
                    <div>

                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 border">
            <a href="/administrator">Все обьявления</a>  <a href="#">Категории</a> <a href="#">Пользователи</a>
            <?php if(Yii::app()->user->hasFlash('success')):?>

                <?php echo Yii::app()->user->getFlash('success'); ?>

            <?php endif; ?>
            <?php if(Advert::model()->getCountNewAdverts()):?>
                <a href="/administrator/new">Новые обьявления (<?= Advert::model()->getCountNewAdverts() ?>)</a>
            <?php endif; ?>

            <?php echo $content; ?>
        </div>
    </div>
</div>

</body>
</html>
